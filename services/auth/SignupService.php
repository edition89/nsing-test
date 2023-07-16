<?php
namespace app\services\auth;

use app\models\SignupForm;
use app\models\User;
use Yii;

class SignupService
{
    public function signup(SignupForm $form)
    {
        $user = new User();
        $user->username = $form->username;
        $user->generateAuthKey();
        $user->setPassword($form->password);
        $user->email = $form->email;
        $user->email_confirm_token = Yii::$app->security->generateRandomString();
        $user->status = User::STATUS_WAIT;
        if (!$user->save()) {
            throw new \RuntimeException('Saving error.');
        }

        return $user;
    }

    public function confirmation($token): void
    {
        if (empty($token)) {
            throw new \DomainException('Empty confirm token.');
        }

        $user = User::findOne(['email_confirm_token' => $token]);
        if (!$user) {
            throw new \DomainException('User is not found.');
        }

        $user->email_confirm_token = null;
        $user->status = User::STATUS_ACTIVE;
        if (!$user->save()) {
            throw new \RuntimeException('Saving error.');
        }
        $user->on(User::USER_VERIFIED, ['app\services\EventLogsService', 'sendMailForSubscribes'], $user);
        $user->trigger(User::USER_VERIFIED);
        if (!Yii::$app->getUser()->login($user)) {
            throw new \RuntimeException('Error authentication.');
        }
    }

}
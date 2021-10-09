<?php
namespace App\Utility;

// TODO don't use hname & rname as column name just use 'name' or 'password'
// TODO should be one session
// TODO encrypted passwords
class UserUtility extends Singleton {
    public static ?\App\Utility\DatabaseUtility $database = null;

    public static function getInstance(): UserUtility {
        return parent::getInstance();
    }

    public function initializeInstance() {
        self::$database = \App\Utility\DatabaseUtility::getInstance();

        if (isset($_POST['logout']) || isset($_GET['logout'])) {
            $this->logout();
        }
        if (!$this->isLoggedIn()) {
            $this->login();
        }
    }

    public function logout() {
        $this->clearSession();
    }

    public function clearSession() {
        // $_SESSION = []; // Clean Session or:
        $this->clearSessionHospital();
        $this->clearSessionReceiver();
    }

    protected function clearSessionHospital() {
        unset($_SESSION['hid']);
        unset($_SESSION['hname']);
        unset($_SESSION['hemail']);
    }

    protected function clearSessionReceiver() {
        unset($_SESSION['rid']);
        unset($_SESSION['rname']);
        unset($_SESSION['remail']);
    }

    public function isLoginHospital(): bool {
        return isset($_POST['hlogin']);
    }

    public function isLoginReceiver(): bool {
        return isset($_POST['rlogin']);
    }

    public function isLoggedIn(): bool {
        $this->checkDoubleLogin();
        return $this->isLoggedInHospital() || $this->isLoggedInRecevier();
    }

    /**
     * Check whether the user is logged in twice
     */
    protected function checkDoubleLogin() {
        if (!empty($_SESSION['hid']) && !empty($_SESSION['rid'])) {
            $this->clearSession();
        }
    }

    public function isLoggedInHospital(): bool {
        if (!empty($_SESSION['hid'])) {
            $rows = self::$database->prepareObjects('SELECT id FROM hospitals WHERE id = :id LIMIT 1', [
                ':id' => $_SESSION['hid'],
            ]);
            if (count($rows) === 1) {
                return true;
            } else {
                $this->clearSessionHospital();
            }
        }
        return false;
    }

    public function isLoggedInRecevier(): bool {
        if (!empty($_SESSION['rid'])) {
            $rows = self::$database->prepareObjects('SELECT id FROM receivers WHERE id = :id LIMIT 1', [
                ':id' => $_SESSION['rid'],
            ]);
            if (count($rows) === 1) {
                return true;
            } else {
                $this->clearSessionReceiver();
            }
        }
        return false;
    }

    public function login() {
        $this->clearSession();

        if ($this->isLoginHospital()) {
            $email = isset($_POST['hemail']) ? $_POST['hemail'] : '';
            $password = isset($_POST['hpassword']) ? $_POST['hpassword'] : '';

            $user = $this->getUserHospitalByEmailAndPassword($email, $password);
            if ($user) {
                $_SESSION['hid'] = $user->id;
                $_SESSION['hname'] = $user->hname;
                $_SESSION['hemail'] = $user->hemail;
            } else {
                // TODO better user validation
                header('Location: /login.php?error=Wrong email or password. Please try again.');
                exit();
            }
        } else if ($this->isLoginReceiver()) {
            $email = isset($_POST['remail']) ? $_POST['remail'] : '';
            $password = isset($_POST['rpassword']) ? $_POST['rpassword'] : '';

            $user = $this->getUserReceiverByEmailAndPassword($email, $password);
            if ($user) {
                $_SESSION['rid'] = $user->id;
                $_SESSION['rname'] = $user->rname;
                $_SESSION['remail'] = $user->remail;
            } else {
                // TODO better user validation
                header('Location: /login.php?error=Wrong email or password. Please try again.');
                exit();
            }
        }
        return null;
    }

    public function getUserHospitalByEmailAndPassword(string $email, string $password): ?\stdClass {
        $rows = self::$database->prepareObjects('SELECT * FROM hospitals WHERE hemail = :email && hpassword = :password LIMIT 1', [
            ':email' => $email,
            ':password' => $password,
        ]);
        if (count($rows) === 1) {
            return $rows[0];
        }
        return null;
    }

    public function getUserReceiverByEmailAndPassword(string $email, string $password): ?\stdClass {
        $rows = self::$database->prepareObjects('SELECT * FROM receivers WHERE remail = :email && rpassword = :password LIMIT 1', [
            ':email' => $email,
            ':password' => $password,
        ]);
        if (count($rows) === 1) {
            return $rows[0];
        }
        return null;
    }
}

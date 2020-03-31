<?php
session_start();
class User {
    private $UserId , $UserName, $UserEmail, $UserPassword ;

    public function getUserId()
    {
        return $this->UserId;
    }
    public function setUserId($UserId)
    {
        return $this->UserId = $UserId;
    }

    public function getUserName()
    {
        return $this->UserName;
    }
    public function setUserName($UserName)
    {
        return $this->UserName = $UserName;
    }

    public function getUserEmail()
    {
        return $this->UserEmail;
    }
    public function setUserEmail($UserEmail)
    {
        return $this->UserEmail = $UserEmail;
    }

    public function getUserPassword()
    {
        return $this->UserPassword;
    }
    public function setUserPassword($UserPassword)
    {
        return $this->UserPassword = $UserPassword;
    }

    public function insertUsers()
    {
        include 'conn.php';
        $req = $bdd->prepare("INSERT INTO users(UserName,UserEmail,UserPassword) 
        VALUES(:UserName, :UserEmail, :UserPassword)");

        $req->execute(array(
            'UserName' => $this->getUserName(),
            'UserEmail' => $this->getUserEmail(),
            'UserPassword' => $this->getUserPassword()
        ));
    }

    public function loginUser()
    {
        include 'conn.php';
        $req = $bdd->prepare("SELECT * FROM users WHERE UserEmail=:UserEmail AND UserPassword=:UserPassword");

        $req->execute(array(
            "UserEmail" => $this->getUserEmail(),
            "UserPassword" => $this->getUserPassword()
        ));

        if($req->rowCount() == 0 )
        {
            header("Location:index.php?error=1");
            return false;
        }
        else{
            while($data=$req->fetch())
            {
                $this->setUserId($data["UserId"]);
                $this->setUserName($data["UserName"]);
                $this->setUserEmail($data["UserEmail"]);
                $this->setUserPassword($data["UserPassword"]);

                header("Location:Home.php");
                return true;
            }
        }
    }
}

class chat{
    private $chatId,$chatUserId,$chatText;

    public function getchatId()
    {
        return $this->chatId;
    }
    public function setchatId($chatId)
    {
        return $this->chatId = $chatId;
    }
    public function getchatUserId()
    {
        return $this->chatUserId;
    }
    public function setchatUserId($chatUserId)
    {
        return $this->chatUserId = $chatUserId;
    }
    public function getchatText()
    {
        return $this->chatText;
    }
    public function setchatText($chatText)
    {
        return $this->chatText = $chatText;
    }

    public function insertChatMessage()
    {
        include 'conn.php';
        $req = $bdd->prepare("INSERT INTO chat (chatUserId,chatText) VALUES(:chatUserId, :chatText)");
        $req->execute(array(
            "chatUserId" => $this->getchatUserId(),
            "chatText" => $this->getchatText()
        ));
    }
    public function displayMessage()
    {
        include 'conn.php';
        $chatReq=$bdd->prepare("SELECT * FROM chat ORDER BY chatId");
        $chatReq->execute();

        while($dataChat = $chatReq->fetch())
        {
            $userReq = $bdd->prepare("SELECT * FROM users WHERE UserId =:UserId ");
            $userReq->execute(array(
                "UserId" => $dataChat['chatUserId']
            ));
            $dataUser = $userReq->fetch();
            ?>
            <span class="UserNameS"><?php echo $dataUser['UserName'];?></span>
            <strong style="color : #4a84d8">says</strong>
        <br>
            <span class="UserMessageS" 
            style =" color : red ; background-color : #f1f1f1 ;
            border-radius : 5px; padding:1.5px ; margin : 10px ;
            border : 2px solid #dedede ; width :300px">
            <?php echo htmlspecialchars($dataChat['chatText']); ?>
            </span>
            <br> <br>
            <?php 
        }
        
    }
}
?>
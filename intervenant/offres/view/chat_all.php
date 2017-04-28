
<?php
function display_chat($messages){
    
?>
<div class="container clearfix">
    <div class="chat">   
      <div class="chat-history">
        <ul class="chat-ul">
            <?php foreach($messages as $message){ ?>
          <li>
            <div class="message <?php echo $message['sender']==$_SESSION['idcontact']?"me":"you";?>-message">
                <?php echo $message['message'];?>
            </div>
          </li>
          
        <?php    }?>
         <form action="" method="POST">
                <fieldset class="form-horizontal">
   
                 <div class="form-group">
  
                    <div class="col-sm-8 ">
                        <textarea name="text" class="default form-control" >Je souhaite postuler à cette offre.</textarea>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-8">
                        <input type="submit" name="inscription" class="default btn btn-success" value="Valider" onclick="test(<?php $job->id;?>)">
                    </div>
                </div>
                </fieldset>
            </form>      
      </div> <!-- end chat-history -->

    </div> <!-- end chat -->
  </div>
<?php } ?>
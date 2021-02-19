<?php

class Postit_search
{
    /** Source path e.g. img/napoli.jpg */
    private $_id;
    private $_user_id;
    private $_idea_text;


    /**
     *  __construct
     * pass row element on creation.
     * @param $row: a db row containing the necessary info on a picture
     * @param $id: a local id given to set up a lightbox for image view at full size
     */
    public function __construct($row){
        $this->_id = $row['id'];
        $this->_idea_text = $row['idea_text'];
        $this->_user_id = $row['user_id'];
    }


    public function render($position_page_dots,$position_page_bot){

        echo '<div class="post_old" >';
        echo '<form action="'.$position_page_dots.'includes/postit_search.php" method="POST" autocomplete="off">';
        echo '<input type="hidden"  name="page" value="'.$position_page_bot.'">';
        echo '<input type="hidden" name="id" value='.$this->_id.'>';
        echo '<input type="hidden" class="association_edit" name="association_edit" value="" >';
        echo '<div class="field_old" >';
        echo '<textarea id='.$this->_id.' class="text_old" contenteditable="true" type="text" name="idea_text" onfocus="toggle_save('.$this->_id.')" onblur="toggle_save('.$this->_id.')">'.$this->_idea_text.'</textarea>';
    /*    echo '<textarea id="" class="field_old input is-warning" type="text" placeholder="'.$this->_idea_text.'"></textarea>'; */
        echo '</div>';
        echo '<div class="button_save" id="button_'.$this->_id.'">';
        echo '<button name="save" class="button is-warning is-inverted is-outlined" onclick="save_keyword_edit('.$this->_id.'); ">Speichern</button>';
        echo '</div>';
        /*echo '</div>';*/
        echo '</form>';
        echo '</div>';

    }

}

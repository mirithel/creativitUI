<div class="column assistant_pic is-two-fifths">
  <div id="picture_content">
    <h1 class="menu-label">Inspirierende Bilder</h1>

    <section id="automatic_search">
      <div>
        <div class="title_manual_search">
          <p class="level-left title_pic" id="display_keyword">
          </p>

          <!--<button class="button level-right button_pictures" onclick="pictures_api_ideas();">Her damit!</button>-->
        </div>

        <div class="wrapper">
          <div id="pictures_bot_ideas">
          </div>
        </div>

      </div>
    </section>

    <section id="manual_search">
      <div class="field has-addons" >
        <div class="control search_control">
          <input id="search_pic" class="input pic_search" type="text" placeholder="Suchbegriff eingeben, z.B. '<?php echo $_SESSION["question_keyword"]?>'">
          <a id="trigger_button" class="button is-info" onclick="pictures_api();" >
            <i class="fas fa-search"></i>
          </a>
        </div>
      </div>


      <div class="wrapper">
        <div id="pictures_bot">
        </div>
      </div>

    </section>
  </div>
</div>

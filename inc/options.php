<?php
    function admin_options(){
        add_theme_page( 'Ying Yang Options', 'Ying Yang Options','administrator', 'admin_options','options_functions');
        
  
        add_action( 'admin_init', 'register_options' );
    }
        
    function register_options(){
        register_setting( 'admin_optionsgroup1', 'yinyang_footer_copy_text' );
        register_setting( 'admin_optionsgroup1', 'yinyang_show_related_posts' );
    }

    function options_functions(){ ?>

        <div class="wrap">
            <h1>Ying Yang Options</h1>
            <form action="options.php" method="post">
                <?php settings_fields( 'admin_optionsgroup1' );?>
                <?php do_settings_sections( 'admin_optionsgroup1' );?>

                <table class="form-table">
                    <tr valing="top">
                        <th scope="row">Footer copyrigth</th>
                        <td><input type="text" name="yinyang_footer_copy_text" value="<?php echo get_option('yinyang_footer_copy_text');?>"/></td>
                    </tr>
                    <tr valing="top">
                        <legend class="screen-reader-text"><span>Related Posts</span></legend>
                        <th scope="row">Related Posts</th>
                        <td><label for="yinyang_show_related_posts"><input type="checkbox" name="yinyang_show_related_posts" value="1" <?php checked(1, get_option('yinyang_show_related_posts')); ?>/>Show/Hidde related posts in View Post</label></td>
                    </tr>
                </table>
                <?php submit_button('Guardar');?>
            </form>
        </div>
    <?php

    }
    
    add_action( 'admin_menu', 'admin_options');
?>
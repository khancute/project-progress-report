<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <?php echo $this->Html->charset(); ?>
        <title>
            <?php echo $title; ?>
        </title>
        <?php
        echo $this->Html->meta('icon');
        //echo $this->Html->css('cake.generic');
        echo $this->Html->script('jquery.min');
        echo $this->Html->script('bootstrap.min');
        echo $this->Html->script('bootstrap-datepicker');
        echo $this->Html->script('script');
        echo $this->Html->css('bootstrap/css/bootstrap.min');
        echo $this->Html->css('bootstrap/css/datepicker');
        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?>
        <style>
            .bs-docs-example:after {
                background-color: #F5F5F5;
                border: 1px solid #DDDDDD;
                border-radius: 4px 0 4px 0;
                color: #9DA0A4;
                content: "Search";
                font-size: 12px;
                font-weight: bold;
                left: -1px;
                padding: 3px 7px;
                position: absolute;
                top: -1px;
            }
            form.bs-docs-example {
                padding-bottom: 19px;
            }
            .bs-docs-example {
                background-color: #FFFFFF;
                border: 1px solid #DDDDDD;
                border-radius: 4px 4px 4px 4px;
                margin: 15px 0;
                padding: 39px 19px 14px;
                position: relative;
            }
        </style>
        <script>var baseUrl = '<?=$baseUrl?>';</script>
    </head>
    <body>
        <div id="container">
            <? if ($isUser && $this->params['action'] != 'login'): ?>
                <? echo $this->element('topbar'); ?>
            <? endif; ?>
            <div id="content" style="margin:50px;">
                <?php echo $this->fetch('content'); ?>
            </div>
        </div>
        <?php //echo $this->element('sql_dump'); ?>
    </body>
</html>

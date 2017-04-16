<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" xmlns="http://www.w3.org/1999/html"> <!--<![endif]-->

    <head>
        <?php
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->view("header.php");
        ?>
    </head>

    <body data-spy="scroll">
        <?php $this->load->view("menu.php"); ?>
        <section class="content">
            <div class="container">
                <br>
                <br>
                <br>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <?php echo form_open('collaborative_annotations/store', ['class' => 'form-group']); ?>

                        <div class="form-group">
                            <?php echo form_label('entryname :'); ?>
                            <?php echo form_input(['name' => 'entryname', 'class' => 'form-control']); ?>
                        </div>
                        <div class="form-group">
                            <?php echo form_label('proteinname :'); ?>
                            <?php echo form_input(['name' => 'proteinname', 'class' => 'form-control']); ?>
                        </div>
                        <div class="form-group">
                            <?php echo form_label('genename :'); ?>
                            <?php echo form_input(['name' => 'genename', 'class' => 'form-control']); ?>
                        </div>
                        <div class="form-group">
                            <?php echo form_label('organism :'); ?>
                            <?php echo form_input(['name' => 'organism', 'class' => 'form-control']); ?>
                        </div>
                        <div class="form-group">
                            <?php echo form_label('taxonomiclineage :'); ?>
                            <?php echo form_input(['name' => 'taxonomiclineage', 'class' => 'form-control']); ?>
                        </div>
                        <div class="form-group">
                            <?php echo form_label('proteinfamily :'); ?>
                            <?php echo form_input(['name' => 'proteinfamily', 'class' => 'form-control']); ?>
                        </div>

                        <!--<a href="{{ URL::previous() }}" class="btn btn-default">Voltar</a>-->
                        <button type="submit" class="btn btn-primary">Salvar</button>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div><!--//container-->
        </section><!--//about-->
        <?php
        $this->load->view("footer.php");
        ?>
    </body>
</html> 




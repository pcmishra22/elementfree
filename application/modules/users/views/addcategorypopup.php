<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Subscription</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/font-awesome.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/style.css" />
        <script type="text/javascript" src="<?php echo base_url()?>js/frontend/jquery.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>js/frontend/jquery.min.js"></script>
    </head>
    <body style="background:#fff;">
        <div class="container">
            <div class="row">
                <h3 class="bule-text">Create a New Category</h3>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <input type="text" id="wordorganized" name="wordorganized" placeholder="Enter the word or phrase to be organized, this should be in the document"></input>
                    <input type="hidden" id="iddocument" name="iddocument" value="<?php echo $this->_ci_cached_vars['id_document']; ?>"></input>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <img id="imgpreview" src="<?php echo $this->_ci_cached_vars['img_preview']; ?>"/>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Selected Words:</label>
                    <div id="containerselectedword" class="col-lg-12 col-md-12 col-sm-12 col-xs-12"></div>
                    <hr style="margin: 10px 0;">
                    <span id="selectwords">Select the words to be include in the organization of the new category</span>
                    <br><br>
                    <div id="containerwords" class="col-lg-12 col-md-12 col-sm-12 col-xs-12"></div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <label>* Category:</label>
                    <select class="selectcategory" name="selectcategory" id="selectcategory">
                        <option value="" disabled selected>- Select -</option>
                        <option value="" style="color: #1787AA; font-weight: bold;">Add New Category</option>
                    </select>
                    <div id="containernewcategory">
                        <input type="text" id="datanewcategory" name="datanewcategory" class="selectcategory" placeholder="Name of new category"/>
                        <div>
                            <button type="button" class="btn btn-default" id="savenewcategory">
                                Add&nbsp;&nbsp;<i class="glyphicon glyphicon-ok"></i> 
                            </button>
                            <button type="button" class="btn btn-default" id="cancelnewcategory">
                                Cancel&nbsp;&nbsp;<i class="glyphicon glyphicon-remove"></i> 
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <label>* Sub Category:</label>
                    <select class="selectcategory" name="selectsubcategory" id="selectsubcategory">
                        <option value="" disabled selected>- Select -</option>
                    </select>
                    <div id="containernewsubcategory">
                        <input type="text" id="datanewsubcategory" name="datanewsubcategory" class="selectcategory" placeholder="Name of new sub category"/>
                        <div>
                            <button type="button" class="btn btn-default" id="savenewsubcategory">
                                Add&nbsp;&nbsp;<i class="glyphicon glyphicon-ok"></i> 
                            </button>
                            <button type="button" class="btn btn-default" id="cancelnewsubcategory">
                                Cancel&nbsp;&nbsp;<i class="glyphicon glyphicon-remove"></i> 
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <label style="width: 100%;">&nbsp;</label>
                    <input type="text" id="valuecategory" name="valuecategory" class="selectcategory" placeholder="Enter the value of this new categorization"/>
                    <i class="glyphicon glyphicon-info-sign" title="This value will be displayed in the filters in the category pages"></i>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"></div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"></div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <label>&nbsp;</label>
                    <button type="button" class="btn btn-default" id="saveaddcategory" name="saveaddcategory">
                        Done&nbsp;&nbsp;<i class="glyphicon glyphicon-ok"></i> 
                    </button>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 footer"></div>
        </div>
    </body>
</html>

<style>
    #wordorganized { width: 100%; height: 40px; padding: 0 10px; font-size: 16px; }
    #imgpreview { width: 100%; }
    #selectwords { font-size: 17px; }
    #imgpreview { border: 1px solid #000; }
    #selectedwordinput { width: 100%; }
    #containerselectedword { height: 75px; overflow-y: auto; }
    #containerwords { height: 40vw; overflow-y: auto; }
    #saveaddcategory { color: #fff; background-color: #3185ad; width: 100%; font-size: 18px; border-radius: 8px; }
    #valuecategory { width: 90%; }
    #containernewcategory, #containernewsubcategory { display: none; }
    #containernewcategory div, #containernewsubcategory div { width: 100%; text-align: center; margin-top: 5px; }
    .footer { padding: 25px; margin-top: 30px; }
    .wordcontent { white-space: nowrap; overflow: hidden; text-overflow: ellipsis; border: 1px dotted #3185ad; }
    .wordcontent span { padding-left: 5px; }
    .wordlabel { display: initial; font-weight: normal; }
    .selectcategory { width: 100%; background-color: #fff; height: 39px; border: 1px outset #3185ad; border-radius: 20px; padding: 0 10px; }
    .glyphicon-floppy-disk { top: 3px; }
    .glyphicon-info-sign { font-size: 20px; vertical-align: middle; padding-bottom: 5px; color: #A9A9A9; cursor: pointer; }
    .glyphicon-info-sign:hover { color: #3185AD; }
</style>

<script>
    var selectedwords = new Array();
    var noselectedwords = new Array();
    var wordorganized = "";
    
    $(document).ready(function(){
        
        getCategories("-");
        
        $("#wordorganized").keyup(function(){
            wordorganized = $("#wordorganized").val();
            var html = "";
            var word = $("#wordorganized").val();
            var document = $("#iddocument").val();
            if ( word != "" && word.length >= 1 ) {
                $.ajax ({
                    url: "<?php echo base_url();?>users/searchwordsdocument",
                    type: "POST",
                    data: "document="+document+"&word="+word,
                    success: function(resp) {
                        var words = jQuery.parseJSON(resp);
                        for (i in words) {
                            var index = selectedwords.indexOf(words[i]);
                            if ( index >= 0 ) {
                                var checked = "checked";
                            } else {
                                var checked = "";
                            }
                            html += "<div class='col-lg-4 col-md-4 col-sm-6 col-xs-12 wordcontent'><input type='checkbox' onclick='saveselectionword(\""+words[i]+"\");' class='wordcategory' name='wordcategory"+i+"' id='"+words[i]+"' value='"+words[i]+"' "+checked+" /><label for='"+words[i]+"' class='wordlabel'>"+words[i]+"</label></div>";
                        }
                        $("#containerwords").html(html);
                    }
                });
            } else {
                $("#containerwords").html(html);
            }
        });

        $("#selectcategory").change(function(){
            var html = "";
            var selectcategory = $("#selectcategory").val();
            if ( selectcategory != "" ) {
                $.ajax ({
                    url: "<?php echo base_url();?>users/searchsubcategories",
                    type: "POST",
                    data: "category="+selectcategory,
                    success: function(resp) {
                        var subcategories = jQuery.parseJSON(resp);
                        var cont = 0;
                        for (i in subcategories) {
                            if ( subcategories[i]['subcat'] != "" ) {
                                if ( cont == 0 ) {
                                    html += '<option value="" disabled selected>- Select -</option>';
                                    html += '<option value="" id="addsubcategory" style="color: #1787AA; font-weight: bold;">Add New Sub Category</option>';
                                    cont = 1;
                                }
                                html += "<option value=\""+subcategories[i]['subcat']+"\">"+subcategories[i]['subcat']+"</option>";
                            }
                        }
                        if ( html != "" ) {
                            $("#selectsubcategory").html(html);
                        } else {
                            html += '<option value="" disabled selected>- Select -</option>';
                            html += '<option value="" id="addsubcategory" style="color: #1787AA; font-weight: bold;">Add New Sub Category</option>';
                            $("#selectsubcategory").html(html);
                        }
                    }
                });
            } else {
                html += '<option value="" disabled selected>- Select -</option>';
                $("#selectsubcategory").html(html);
                addNewCategory();
            }
        });
        
        $("#selectsubcategory").change(function(){
            var selectsubcategory = $("#selectsubcategory").val();
            if ( selectsubcategory == "" ) {
                addNewSubCategory();
            }
        });
    });
    

    // categoria
    $("#savenewcategory").click(function(){
        var newcategory = $("#datanewcategory").val();
        if ( newcategory != "" ) {
            newcategory = newcategory.replace(" ", "-");
            $.ajax ({
                url: "<?php echo base_url();?>users/saveNewCategory",
                type: "POST",
                data: "namecategory="+newcategory+"&wordorganized="+wordorganized,
                success: function(resp) {
                    $("#selectcategory").css("display","block");
                    $("#containernewcategory").css("display","none");
                    $("#datanewcategory").val('');
                    getCategories(newcategory);
                }
            });
        }
    });
    
    $("#cancelnewcategory").click(function(){
        $("#selectcategory").css("display","block");
        $("#containernewcategory").css("display","none");
        $("#datanewcategory").val('');
    });
    
    
    // subcategoria
    $("#savenewsubcategory").click(function(){
        var category = $('#selectcategory').val();
        var newsubcategory = $("#datanewsubcategory").val();
        if ( newsubcategory != "" ) {
            newsubcategory = newsubcategory.replace(" ", "-");
            $.ajax ({
                url: "<?php echo base_url();?>users/saveNewSubCategory",
                type: "POST",
                data: "namecategory="+category+"&namesubcategory="+newsubcategory+"&wordorganized="+wordorganized,
                success: function(resp) {
                    $("#selectsubcategory").css("display","block");
                    $("#containernewsubcategory").css("display","none");
                    $("#datanewsubcategory").val('');
                    $('#selectcategory').change();
                }
            });
        }
    });
    
    $("#cancelnewsubcategory").click(function(){
        $("#selectsubcategory").css("display","block");
        $("#containernewsubcategory").css("display","none");
        $("#datanewsubcategory").val('');
    });
    
    $("#saveaddcategory").click(function(){
        var error = false;
        var category = $("#selectcategory").val();
        var subcategory = $("#selectsubcategory").val();
        var document = $("#iddocument").val();
        var valuecategory = $("#valuecategory").val();

        if ( typeof(category) == 'undefined' || category == null ) {
            alert("Select a category.");
            error = true;
        }

        if ( typeof(subcategory) == 'undefined' || subcategory == null ) {
            alert("Select a sub category.");
            error = true;
        }

        if ( valuecategory == "" ) {
            alert("Select the value of this new categorization.");
            error = true;
        }

        if ( selectedwords == "" ) {
            alert("Select a words.");
            error = true;
        }
        
        if ( !error ) {
            $.ajax ({
                url: "<?php echo base_url();?>users/saveategorizationdocument",
                type: "POST",
                data: "category="+category+"&subcategory="+subcategory+"&selectedwords="+selectedwords+"&document="+document+"&wordorganized="+wordorganized+"&noselectedwords="+noselectedwords+"&valuecategory="+valuecategory,
                success: function(resp) {
                    window.top.location.reload();
                }
            });
        }
    });
    
    function getCategories(catselected) {
        var html = "";
        $.ajax ({
            url: "<?php echo base_url();?>users/searchcategories",
            type: "POST",
            data: "",
            success: function(resp) {
                var categories = jQuery.parseJSON(resp);
                html += '<option value="" disabled>- Select -</option>';
                html += '<option value="" style="color: #1787AA; font-weight: bold;">Add New Category</option>';
                for (i in categories) {
                    html += "<option value=\""+categories[i]['label']+"\">"+categories[i]['label']+"</option>";
                }
                $("#selectcategory").html(html);
                if ( catselected == "-" ) {
                    $('#selectcategory').prop('selectedIndex',0);                    
                } else {
                    $('#selectcategory').val(catselected);
                    $('#selectcategory').change();
                }
            }
        });
    }

    function saveselectionword( word ) {
        // selected
        var index = selectedwords.indexOf(word);
        if ( index >= 0 ) {
            delete selectedwords[index];
        } else {
            selectedwords.push(word);
        }
        
        // not selected
        $(".wordcategory").each(function( index ) {
            var position = noselectedwords.indexOf($(this).val());
            if( $(this).prop('checked') == false ) {
                if ( position < 0 ) {
                    noselectedwords.push($(this).val());
                }
            } else {
                delete noselectedwords[position];
            }
        });
        
        var html = "";
        for (i in selectedwords) {
            html += "<div class='col-lg-4 col-md-4 col-sm-6 col-xs-12 wordcontent'>"+selectedwords[i]+"</div>";
        }
        $("#containerselectedword").html( html );
    }
    
    function addNewCategory() {
        $("#selectcategory").css("display","none");
        $("#containernewcategory").css("display","block");
        $("#datanewcategory").focus();
        $('#selectcategory').prop('selectedIndex',0);
    }
    
    function addNewSubCategory() {
        $("#selectsubcategory").css("display","none");
        $("#containernewsubcategory").css("display","block");
        $("#datanewsubcategory").focus();
        $('#selectsubcategory').prop('selectedIndex',0);
    }
</script>
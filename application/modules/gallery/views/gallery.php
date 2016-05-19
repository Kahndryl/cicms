
	<div class="grid-form1">
		<form action="" method="post" enctype="multipart/form-data">
			  <input type="file" name="files[]" id="filer_input" multiple="multiple">
			  <input type="submit" value="Submit">
		</form>
	</div>

<link href="<?php echo base_url()?>assets/front/fliar/css/jquery.filer.css" type="text/css" rel="stylesheet" />
<link href="<?php echo base_url()?>assets/front/fliar/css/themes/jquery.filer-dragdropbox-theme.css" type="text/css" rel="stylesheet" />
<script src="<?php echo base_url()?>assets/front/fliar/js/jquery.filer.js"></script>
<script>
	$(document).ready(function(){
	$('#filer_input').filer({
    changeInput: '<div class="jFiler-input-dragDrop"><div class="jFiler-input-inner"><div class="jFiler-input-icon"><i class="icon-jfi-cloud-up-o"></i></div><div class="jFiler-input-text"><h3>Drag&Drop files here</h3> <span style="display:inline-block; margin: 15px 0">or</span></div><a class="jFiler-input-choose-btn blue">Browse Files</a></div></div>',
    showThumbs: true,
    theme: "dragdropbox",
    templates: {
        box: '<ul class="jFiler-items-list jFiler-items-grid"></ul>',
        item: '<li class="jFiler-item">\
                    <div class="jFiler-item-container">\
                        <div class="jFiler-item-inner">\
                            <div class="jFiler-item-thumb">\
                                <div class="jFiler-item-status"></div>\
                                <div class="jFiler-item-info">\
                                    <span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name | limitTo: 25}}</b></span>\
                                    <span class="jFiler-item-others">{{fi-size2}}</span>\
                                </div>\
                                {{fi-image}}\
                            </div>\
                            <div class="jFiler-item-assets jFiler-row">\
                                <ul class="list-inline pull-left">\
                                    <li>{{fi-progressBar}}</li>\
                                </ul>\
                                <ul class="list-inline pull-right">\
                                    <li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
                                </ul>\
                            </div>\
                        </div>\
                    </div>\
                </li>',
        itemAppend: '<li class="jFiler-item">\
                        <div class="jFiler-item-container">\
                            <div class="jFiler-item-inner">\
                                <div class="jFiler-item-thumb">\
                                    <div class="jFiler-item-status"></div>\
                                    <div class="jFiler-item-info">\
                                        <span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name | limitTo: 25}}</b></span>\
                                        <span class="jFiler-item-others">{{fi-size2}}</span>\
                                    </div>\
                                    {{fi-image}}\
                                </div>\
                                <div class="jFiler-item-assets jFiler-row">\
                                    <ul class="list-inline pull-left">\
                                        <li><span class="jFiler-item-others">{{fi-icon}}</span></li>\
                                    </ul>\
                                    <ul class="list-inline pull-right">\
                                        <li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
                                    </ul>\
                                </div>\
                            </div>\
                        </div>\
                    </li>',
        progressBar: '<div class="bar"></div>',
        itemAppendToEnd: false,
        removeConfirmation: true,
        _selectors: {
            list: '.jFiler-items-list',
            item: '.jFiler-item',
            progressBar: '.bar',
            remove: '.jFiler-item-trash-action'
        }
    },
    dragDrop: {
        dragEnter: null,
        dragLeave: null,
        drop: null,
    },
    uploadFile: {
        url: "<?php echo base_url('gallery/admin/upload');?>",
        data: null,
        type: 'POST',
        enctype: 'multipart/form-data',
        beforeSend: function(){},
        contentType: false,
        success: function(data, el){
            var parent = el.find(".jFiler-jProgressBar").parent();
            el.find(".jFiler-jProgressBar").fadeOut("slow", function(){
                $("<div class=\"jFiler-item-others text-success\"><i class=\"icon-jfi-check-circle\"></i> Success</div>").hide().appendTo(parent).fadeIn("slow");    
            });
        },
        error: function(el){
            var parent = el.find(".jFiler-jProgressBar").parent();
            el.find(".jFiler-jProgressBar").fadeOut("slow", function(){
                $("<div class=\"jFiler-item-others text-error\"><i class=\"icon-jfi-minus-circle\"></i> Error</div>").hide().appendTo(parent).fadeIn("slow");    
            });
        },
        statusCode: null,
        onProgress: null,
        onComplete: null,
    },
    onRemove: function(itemEl, file, id, listEl, boxEl, newInputEl, inputEl){
		var file = file.name;
		$.post('<?php echo base_url('gallery/admin/removeFile')?>', {file: file});
	},
	addMore: true,
	files: [
		<?php foreach($gallerys as $gallery):?>
		<?php 
			$filename = explode('/',$gallery->path);
			$filename = $filename[count($filename)-1];
		?>
		{
			name: "<?php echo $filename; ?>",
			size: 5453,
			type: "image/jpg",
			file: "<?php echo base_url().$gallery->path?>"
		},
		<?php endforeach;?>
	]
});
});
</script>

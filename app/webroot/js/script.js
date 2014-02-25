var selectedSow;
$(document).ready(function() {
    $('.dropdown-toggle').dropdown();
    $('#po_received_date, #mos_date, #install_date, #oa_rfs_date, #swap_date, #dismantle_date, #return_back_date, #survey_date, #lmd_date, #esar_1_submit_date, #esar_1_sent_to_hq, #esar_2_submit_date, #esar_2_sent_to_hq').datepicker({
        format: 'dd-mm-yyyy'
    });
    $('#sow2').typeahead({
        minLength: 3,
        source: function(query, process) {
            var data;
            sows = [];
            map = {};
            $.ajax({
                url: baseUrl + '/get_sow/query:' + query,
                async: false,
                success: function(response) {
                    data = jQuery.parseJSON(response);
                }
            });
            $.each(data, function(i, item) {
                map[item.value] = item;
                sows.push(item.value);
            });

            process(sows);
        },
        updater: function(item) {
            selectedSow = map[item].id;
            return item;
        },
        matcher: function(item) {
            if (item.toLowerCase().indexOf(this.query.trim().toLowerCase()) != -1) {
                return true;
            }
        },
        sorter: function(items) {
            return items.sort();
        },
        highlighter: function(item) {
            var regex = new RegExp('(' + this.query + ')', 'gi');
            return item.replace(regex, "<strong>$1</strong>");
        },
    });
    $('#po_detail_sow2').typeahead({
        minLength: 3,
        source: function(query, process) {
            var data;
            var options = [];
            $.ajax({
                url: baseUrl + '/get_detail_sow/parent:' + selectedSow + '/query:' + query,
                async: false,
                success: function(response) {
                    data = jQuery.parseJSON(response);
                }
            });
            $.each(data, function(i, item) {
                options.push(item);
            });

            process(options);
        },
        updater: function(item) {
            return item;
        },
        matcher: function(item) {
            if (item.toLowerCase().indexOf(this.query.trim().toLowerCase()) != -1) {
                return true;
            }
        },
        sorter: function(items) {
            return items.sort();
        },
        highlighter: function(item) {
            var regex = new RegExp('(' + this.query + ')', 'gi');
            return item.replace(regex, "<strong>$1</strong>");
        },
    });
    $('*[data-poload]').bind('click', function() {
        var e = $(this);
        e.unbind('click');
        $.get(e.data('poload'), function(d) {
            e.popover({
                content: d, 
                placement: 'left',
                html: true
            }).popover('show');
        });
    });
    $("#sow").change(function(){
        $.ajax({
            async: false,
            url: baseUrl + '/sow_changed/sow:' + $(this).val(),
            success: function(response){
                var data = $.parseJSON(response);
                var sow_group_options = fill_options(data.group);
                var sow_group_details = fill_options(data.detail);
                if(!sow_group_options){
                    $("#group").html("");
                }else{
                    $("#group").html(sow_group_options);
                }
                if(!sow_group_details){
                    $("#po_detail_sow").html("");
                }else{
                    $("#po_detail_sow").html(sow_group_details);
                }
            }
        });
    });
    $("#group").change(function(){
       $.ajax({
            async: false,
            url: baseUrl + '/group_changed/sow:'+$('#sow').val()+'/group:'+$(this).val(),
            success: function(response){
                var data = $.parseJSON(response);
                var sow_group_details = fill_options(data);
                if(!sow_group_details){
                    $("#po_detail_sow").html("");
                }else{
                    $("#po_detail_sow").html(sow_group_details);
                }
            }
       });
    });
});
function changedItem(itemId, groupObjSelector) {
    $.ajax({
        url: baseUrl + '/changed_item/item_id:' + itemId,
        async: false,
        success: function(response) {
            $(groupObjSelector).html(response);
        }
    });
}
function fill_options(data){
    var options = '';
    $.each(data, function(i, v){
        options+= '<option value="'+v.id+'">'+v.value+'</options>';
    });
    return options;
}
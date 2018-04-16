var TableDatatablesAjax = function () {

    var initPickers = function () {
        //init date pickers
        $('.date-picker').datepicker({
            rtl: App.isRTL(),
            autoclose: true
        });
    }

    var handleRecords = function (ajax_url, id) {

        var grid = new Datatable();

        grid.init({
            src: $("#" + id),
            onSuccess: function (grid, response) {
                // grid:        grid object
                // response:    json object of server side ajax response
                // execute some code after table records loaded
            },
            onError: function (grid) {
                // execute some code on network or other general error  
            },
            onDataLoad: function(grid) {
                // execute some code on ajax data load
            },
            loadingMessage: '正在加载中...',
            dataTable: { // here you can define a typical datatable settings from http://datatables.net/usage/options 

                // Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
                // setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: assets/global/scripts/datatable.js). 
                // So when dropdowns used the scrollable div should be removed. 
                //"dom": "<'row'<'col-md-8 col-sm-12'pli><'col-md-4 col-sm-12'<'table-group-actions pull-right'>>r>t<'row'<'col-md-8 col-sm-12'pli><'col-md-4 col-sm-12'>>",
                //"dom": "<'table-scrollable't><'row'<'col-md-8 col-sm-12'pli><'col-md-4 col-sm-12'>>",
                "bSort": false,
                "bStateSave": true, // save datatable state(pagination, sort, etc) in cookie.
                "bRetrieve": true,
                "bProcessing": false,
                "lengthMenu": [
                    [20, 50, 100],
                    [20, 50, 100] // change per page values here
                ],
                "pageLength": 20, // default record count per page
                "ajax": {
                    "url": ajax_url, // ajax source
                },
                "order": [

                ]// set first column as a default sort by asc
            }
        });

        // handle group actionsubmit button click
        // grid.getTableWrapper().on('click', '.table-group-action-submit', function (e) {
        //     e.preventDefault();
        //     var action = $(".table-group-action-input", grid.getTableWrapper());console.log(grid.getTableWrapper());
        //     if (action.val() != "" && grid.getSelectedRowsCount() > 0) {
        //         grid.setAjaxParam("customActionType", "group_action");
        //         grid.setAjaxParam("customActionName", action.val());
        //         grid.setAjaxParam("id", grid.getSelectedRows());
        //         grid.getDataTable().ajax.reload();
        //         grid.clearAjaxParams();
        //     } else if (action.val() == "") {
        //         App.alert({
        //             type: 'danger',
        //             icon: 'warning',
        //             message: 'Please select an action',
        //             container: grid.getTableWrapper(),
        //             place: 'prepend'
        //         });
        //     } else if (grid.getSelectedRowsCount() === 0) {
        //         App.alert({
        //             type: 'danger',
        //             icon: 'warning',
        //             message: 'No record selected',
        //             container: grid.getTableWrapper(),
        //             place: 'prepend'
        //         });
        //     }
        // });

        //grid.setAjaxParam("customActionType", "group_action");
        //grid.getDataTable().ajax.reload();
        //grid.clearAjaxParams();
    }

    return {

        //main function to initiate the module
        init: function (ajax_url) {

            initPickers();
            var id = 'datatable_ajax';
            if(arguments[1]){
                id = arguments[1];
            }
            handleRecords(ajax_url, id);
        }

    };

}();

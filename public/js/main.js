/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function main() {
//    $('.time_').bootstrapMaterialDatePicker({date: false, time: true, format: 'HH:mm'});
    $('.dataTable').DataTable();
    $('[data-toggle="tooltip"]').tooltip();
    $('[data-toggle="popover"]').popover()

}
$(document).on('ready', main);
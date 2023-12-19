<?php

   //ini_set('display_errors', 1);
   //error_reporting(~0);

  session_start();
  include "connection.php";

   //$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);

   $sql = "SELECT * FROM supplier ";

   $query = mysqli_query($conn,$sql);

   $result=mysqli_fetch_array($query,MYSQLI_ASSOC);

?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>List of Supplier</title>
<link rel="stylesheet" type="text/css" href="navbar.css">
<link rel="stylesheet" type="text/css" href="themes/default/easyui.css">

<link rel="stylesheet" type="text/css" href="themes/icon.css">
<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript" src="jquery.easyui.min.js"></script>
</head>

 <?php include 'menu.php'; ?>

 <table id="dg" title="Supplier Information" class="easyui-datagrid" url="getData.php" toolbar="#toolbar" pagination="true" rownumbers="true" fitColumns="true" singleSelect="true" style="width:100%;height:100px;">


    <thead>
        <tr>
            <th field="SupNo" width="10">No</th>
            <th field="SupName" width="50">Supplier Name</th>
            <th field="SupCompany" width="50">Company Name</th>
             <th field="Department" width="30">Department</th>
            <th field="SupPhoneNo" width="30">Contact Number</th>
            <th field="SupAdd" width="100">Address</th>
            <th field="SupEmail" width="50">Email</th>
        </tr>
    </thead>

 
                              <tbody>
                                 <?php
                                 $rowNumber = 1;
                                while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
                                {
                                ?>
                                  <tr>
                                  <td><?php echo $rowNumber;?></div></td>
                                    <!--td><?php// echo $result["product_id"];?></div></td-->
                                    <td><?php echo $result["SupName"];?></td>
                                    <!--td><?php //echo "<img width='100px' src=\"../image/" . $result['product_image'] . "\"  class='img-thumbnail' alt=\"\" /><br />";?></td-->
                                    
                                    <td><center><?php echo $result["SupCompany"];?></center></td>
                                    <td><?php echo $result["Department"];?></div></td>
                                    <td><center><?php echo $result["SupPhoneNo"];?></center></td>
                                    
                                    <td><center><?php echo $result["SupAdd"];?></center></td>
                                    <td><center><?php echo $result["SupEmail"];?></center></td>
                                
                    

   
                              <?php
                 $rowNumber++;
                 }
                 ?>
                                  
                                
                                </table>
                                <?php
                                mysqli_close($conn);
                                ?>
                              </tbody>
                           
                            </br>
                            </br>
                            
</table>

<div id="toolbar">
    <div id="tb">
        <input id="term" placeholder="Type keywords...">
        <a href="javascript:void(0);" class="easyui-linkbutton" plain="true" onclick="doSearch()">Search</a>
    </div>
    <div id="tb2" style="">
        <a href="javascript:void(0)" float="right" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">New</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()">Edit</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser()">Remove</a>
    </div>
</div>


<div id="dlg" class="easyui-dialog" style="width:80%" data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons'">
    <form id="fm" method="post"  action="addsupplier.php" novalidate style="margin:0;padding:30px 50px">
        <h3>Supplier Information</h3>
        <div style="margin-bottom:10px">
            <input name="SupName" class="easyui-textbox" required="true" label=" Name:" style="width:100%">
        </div>
        <div style="margin-bottom:10px">
            <input name="SupCompany" class="easyui-textbox" required="true" label="Company:" style="width:100%">


             </div>
        <div style="margin-bottom:10px">
            <input name="Department" class="easyui-textbox" required="true" label="Department:" style="width:100%">

            </div>
        <div style="margin-bottom:10px">
            <input name="SupPhoneNo" type="number" class="easyui-textbox" required="true" validType="number" min="0" maxlength="12" label="Contact No:" style="width:100%">
      

            </div>
        <div style="margin-bottom:10px">
            <input name="SupAdd" class="easyui-textbox" required="true" label="Address:" style="width:100%">
     

        </div>
        <div style="margin-bottom:10px">
            <input name="SupEmail" class="easyui-textbox" required="true" validType="email" label="Email:" style="width:100%">   
            </div>

    </form>
</div>
<div id="dlg-buttons">
    <a href="supplierlist.php" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUser()" style="width:90px;">Save</a>
    <a href="javascript:void(0);" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close');" style="width:90px;">Cancel</a>
</div>

<script type="text/javascript">
function doSearch(){
    $('#dg').datagrid('load', {
        term: $('#term').val()
    });
}
      
var url;
function newUser(){
    $('#dlg').dialog('open').dialog('center').dialog('setTitle','New Supplier');
    $('#fm').form('clear');
    url = 'addsupplier.php';
}
function editUser(){
    var row = $('#dg').datagrid('getSelected');
    if (row){
        $('#dlg').dialog('open').dialog('center').dialog('setTitle','Edit Supplier');
        $('#fm').form('load',row);
        url = 'editsupplier.php2?id='+row.id;
    }
}
function saveUser(){
    $('#fm').form('submit',{
       url: url,
        onSubmit: function(){
            return $(this).form('validate')
            url= 'supplierlist.php';
        },
        success: function(response){
            var respData = $.parseJSON(response);
            if(respData.status == 0){
                $.messager.show({
                    title: 'Error',
                    msg: respData.msg
                });
            }else{
                $('#dlg').dialog('close');
                $('#dg').datagrid('reload');
            }
        }
    });
}
function destroyUser(){
    var row = $('#dg').datagrid('getSelected');
    if (row){
        $.messager.confirm('Confirm','Are you sure you want to delete this user?',function(r){
            if (r){
                $.post('deletesupplier.php', {id:row.id}, function(response){
                    if(response.status == 1){
                        $('#dg').datagrid('reload');
                    }else{
                        $.messager.show({
                            title: 'Error',
                            msg: respData.msg
                        });
                    }
                },'json');
            }
        });
    }




}
</script>
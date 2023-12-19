<!DOCTYPE html>
<html>  
    <head>  
        <title>Inline Table Insert Update Delete in PHP using jsGrid</title>  
       <link rel="stylesheet" href="navbar.css" type="text/css" >

       <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker3.css" rel="stylesheet" id="bootstrap-css">
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
       <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.css" >
       <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid-theme.min.css" />
       <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.js"></script>


  <style>
  .hide
  {
     display:none;
  }
  </style>
    </head>  
    <body>  
        <div class="container">  
   <br />
   <div class="table-responsive">  
    <h3 align="center">Inline Table Insert Update Delete in PHP using jsGrid</h3><br />
    <div id="grid_table"></div>
   </div>  
  </div>
  
<script>
 
    $('#grid_table').jsGrid({

     width: "100%",
     height: "600%",

     filtering: true,
     inserting:true,
     editing: true,
     sorting: true,
     paging: true,
     autoload: true,
     pageSize: 10,
     pageButtonCount: 5,
     deleteConfirm: "Do you really want to delete data?",

     controller: {
      loadData: function(filter){
       return $.ajax({
        type: "GET",
        url: "fetchsupplier.php",
        data: filter
       });
      },
      insertItem: function(item){
       return $.ajax({
        type: "POST",
        url: "fetchsupplier.php",
        data:item
       });
      },
      updateItem: function(item){
       return $.ajax({
        type: "PUT",
        url: "fetchsupplier.php",
        data: item
       });
      },
      deleteItem: function(item){
       return $.ajax({
        type: "DELETE",
        url: "fetchsupplier.php",
        data: item
       });
      },
     },

     fields: [
      {
       name: "SupNo",
    type: "hidden",
    css: 'hide'
      },
      {
       name: "SupName", 
    type: "text", 
    width: 100%, 
    validate: "required"
      },
      {
       name: "SupCompany", 
    type: "text", 
    width: 50%, 
    validate: "required"
      },
      {
     name: "SupAdd", 
    type: "text", 
    width: 250%, 
    validate: "required"
     },
      {

   /* {
     if(value > 0)
     {
      return true;
     }
    }
      },
      {
       name: "gender", 
    type: "select", 
    items: [
     { Name: "", Id: '' },
     { Name: "Male", Id: 'male' },
     { Name: "Female", Id: 'female' }
    ],

    valueField: "Id", 
    textField: "Name", */
    name: "SupPhoneNo", 
    type: "number", 
    width: 20%, 
    validate: "required"
     {
     if(value > 0)
     {
      return true;
     }
    }

    name: "SupEmail", 
    type: "text", 
    width: 30%, 
    validate: "required"
      
     
         }
 },


   });

   
</html>

</script>


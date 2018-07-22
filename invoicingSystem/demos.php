<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</head>
<body>

    <button id="quatationButton" data-toggle="modal" data-target="#quatationModal" class="btn btn-primary float-sm-right">Create New Quatation</button>

            <!--Quatation Pop Up Form-->
         <div id="quatationModal" class="modal fade">
             <div class="modal-dialog modal-lg">
              <div class="modal-content">
               <div class="modal-header">
                <h4>Create Invoice Here</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
               </div>
               <div class="modal-body">
                <form method="post" id="insert_form">
                 <label>Invoice Number</label>
                 <input type="text" name="invoiceNo" id="invoiceNo" class="form-control">
                 <br />
                 <label>Company Name</label>
                  <input type="text" name="companyName" id="companyName" class="form-control">
                 <br />
                 <label>Email</label>
                  <input type="text" name="email" id="email" class="form-control">
                 <br />
                 <label>Purchase Order</label>
                  <input type="text" name="purchaseOrder" id="purchaseOrder" class="form-control">
                 <br />
                 <label>Invoice Date</label>
                  <input type="date" name="companyName" id="companyName" class="form-control">
                 <br />
                 <label>Payment Due</label>
                  <input type="text" name="paymentDue" id="paymentDue" class="form-control">
                 <br />
                 <label>Address</label>
                  <textarea class="form-control" id="address" name="address"></textarea>
                 <br />             
               </form>
               <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               </div>
              </div>
             </div>
            </div>
         </div>

</body>
</html>
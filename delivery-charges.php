<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>comShip</title>
    <style>
    input[type=submit] {
      width: 100%;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size:20px;
      background-color:#0d6efd;
    }

  </style>
  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="col-2 bg-primary text-white h5 p-2">
          menu
        </div>
        <div class="col-10 bg-primary text-white h1 p-2 ps-5">
          ComShip
        </div>
      </div>

<center>
  <h3>Ship Your Order</h3>
</center>


  <br>
  <div class="row" id="pickup-details" style="display:block;position:relative;width:auto;height:660px;">
  <div class="row" style="background-color:#f2f2f2;height:auto;width:90%;margin:auto;top:0;right:0;left:0;bottom:0;">
  <br>
  <div class="text-primary" style="font-size:20px;text-align: center;height:80px;font-weight:bold;"> Delivery charges </div>

  <div id="delivery-charges-body" class="row" style="padding:5px;">
    <div class="col-8">
      Charges
    </div>
    <div class="col-4" style="text-align:right;">
      $40
    </div>

  </div>

  <div id="delivery-tax-charges-body" class="row" style="padding:5px;">
    <div class="col-8">
      Tax
    </div>
    <div class="col-4" style="text-align:right;">
      $0
    </div>

  </div>

  <div id="delivery-total-charges-body" class="row" style="padding:5px;">
    <div class="col-8">
      Total amount
    </div>
    <div class="col-4" style="text-align:right;">
      $40
    </div>


  </div>


  <div id="select-cod" class="row" style="padding:5px;">
    <div class="col-1">
      <input type="radio" checked="true" />
    </div>
    <div class="col-11" style="text-align:left;">
      Cash On Delivery
    </div>
  </div>
  <div id="select-prepaid" class="row" style="padding:5px;">
      <div class="col-1">
        <input type="radio" />
      </div>
      <div class="col-11" style="text-align:left;">
        Pay now
      </div>
  </div>


    <div id="pickup details" class="row" style="padding:5px;background:white;margin:0;margin-top:15px;  ">
        <div class="row">
          Pickup details
        </div>
        <div class="row">
          User name
        </div>
        <div class="row">
          user address sdffsdfk sdjfk jskdfj sdkjf ksjdfkj sklfj klsjdfk jsdfkl jsdkj sdlkfj sdkf jsdkj
        </div>
        <div class="row">
          mobile no
        </div>
    </div>

    <div id="p destination details" class="row" style="padding:5px;margin:0;margin-top:15px;background:white;">
        <div class="row">
          Destination details
        </div>
        <div class="row">
          User name
        </div>
        <div class="row">
          user address sdffsdfk sdjfk jskdfj sdkjf ksjdfkj sklfj klsjdfk jsdfkl jsdkj sdlkfj sdkf jsdkj
        </div>
        <div class="row">
          mobile no
        </div>
    </div>
    <br>
    <div class="continue-button" style="margin-top:10px;">
    <input type="submit"  value="Continue">
  </div>
    </div>


  </div>



  </body>
</html>

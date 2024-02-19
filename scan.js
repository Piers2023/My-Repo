let isCheckCamera = false
function onScanSuccess(decodedText, decodedResult) {
    // handle the scanned code as you like, for example:
    if(!isCheckCamera){
      console.log("Successfully");
      window.location.replace(decodedText);
      isCheckCamera = true;
    }else{
      setTimeout(()=>{
        isCheckCamera = false;
      },3000)
    }
    

  }
  
  function onScanFailure(error) {
    // handle scan failure, usually better to ignore and keep scanning.
    // for example:
    console.warn(`Failed = ${error}`);
  }
  
  let html5QrcodeScanner = new Html5QrcodeScanner(
    "reader",
    { fps: 10, qrbox: {width: 250, height: 250} ,videoConstraints:{facingMode:{exact: "environment"}}},
    /* verbose= */ false);
  html5QrcodeScanner.render(onScanSuccess, onScanFailure);
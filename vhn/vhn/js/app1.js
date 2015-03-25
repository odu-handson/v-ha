var wrapper2 = document.getElementById("signature-pad2"),
    clearButton2 = wrapper2.querySelector("[data-action=clear]"),
    saveButton2 = wrapper2.querySelector("[data-action=save]"),
    canvas2 = wrapper2.querySelector("canvas"),
	img2 = wrapper2.querySelector("img"),
    signaturePad2;

// Adjust canvas coordinate space taking into account pixel ratio,
// to make it look crisp on mobile devices.
// This also causes canvas to be cleared.
function resizeCanvas() {
    var ratio =  window.devicePixelRatio || 1;
    canvas2.width = canvas2.offsetWidth * ratio;
    canvas2.height = canvas2.offsetHeight * ratio;
    canvas2.getContext("2d").scale(ratio, ratio);
}

window.onresize = resizeCanvas;
resizeCanvas();

signaturePad2 = new SignaturePad(canvas2);

clearButton2.addEventListener("click", function (event) {
    signaturePad2.clear();
});

saveButton2.addEventListener("click", function (event) {
    if (signaturePad2.isEmpty()) {
        alert("Please provide signature first.");
    } else {
        //window.open(signaturePad.toDataURL());
		img2.src = signaturePad2.toDataURL();
		document.getElementById("pad2body").style.visibility = 'hidden'; 
		document.getElementById("pad2footer").style.visibility = 'hidden'; 
    }
});

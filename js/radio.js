
function filterTab() {
var customModal = document.createElement("div");
            customModal.id = "customModal";

            // 设置div样式
            customModal.style.width = "60%";
	    customModal.style.height = "80%";
            customModal.style.border = "1px solid #ccc";
            customModal.style.backgroundColor = "#fff";
            customModal.style.padding = "20px";
            customModal.style.position = "absolute";
            customModal.style.top = "20px";
            customModal.style.left = "20%";

            // 创建Close按钮
            var closeBtn = document.createElement("div");
            closeBtn.id = "closeBtn";
            closeBtn.innerHTML = "X";
            closeBtn.style.position = "absolute";
            closeBtn.style.top = "10px";
            closeBtn.style.right = "10px";
            closeBtn.style.cursor = "pointer";
            closeBtn.onclick = function() {
                document.body.removeChild(customModal);
            };
	    var filterCount = 1;

            function createFilterRow() {
if (filterCount<5)
{
                // 创建一行元素
                var filterRow = document.createElement("div");
                filterRow.className = "filterRow";

                // 创建label
                var label = document.createElement("label");
                label.textContent = "filter " + filterCount+"  ";
                label.style.marginRight="10px";
                label.style.marginTop="5px";

var select1Options = ["Ant_manufacturer", "Ant_model", "Ant_polar", "Ant_gaintype", "Ant_lowgain", "Ant_gain", "Ant_highgain", "Ant_radomattn", "Ant_diaga", "Ant_diagh", "Ant_diagv", "Ant_xpd", "Ant_backattn", "Ant_lowfreq", "Ant_highfreq", "Ant_diam", "Eqp_manufacturer", "Eqp_model", "Eqp_lowerfreq", "Eqp_upperfreq", "Eqp_rxlowerfreq", "Eqp_rxupperfreq","Eqp_desigemission", "Eqp_bw", "Eqp_modulation", "Eqp_minpower", "Eqp_maxpower", "Eqp_power", "Eqp_ktbf", "Eqp_noisef", "Eqp_ci", "Eqp_sensitivity", "Eqp_rxth3","Eqp_rxth6","Eqp_rxth8","Eqp_rxth10","Eqp_rxth3g","Eqp_rxth6g","Eqp_rxth8g","Eqp_rxth10g","Eqp_atpc","Pos_name","Pos_code","Pos_X","Pos_Y","Pos_longitude","Pos_latitude","Pos_asl","Pos_province","Pos_subprovince","Pos_city","Pos_cityid","Pos_address","Pos_admcode","Mwa_name","Mwa_desigem","Mwa_bw","Mwa_mbitps","Mwa_status","Mwa_supprdemref","Mwa_supprdemrem","Mwa_clongitude","Mwa_clatitude","Mwa_distance","Mwa_clearance","Mws_role","Mws_endrole","Mws_txfreq","Mws_polar","Mws_gain","Mws_power","Mws_eirp", "Mws_radomattn","Mws_txloss","Mws_txaddloss","Mws_recpower","Mws_rxloss","Mws_agl1","Mws_azimuth","Mws_angleelev","Mws_distance","Mws_gainrx2","Mws_rxloss2","Mws_recpower2"];


                // 创建第一个select
                var select1 = createSelect(select1Options);
		select1.id = "customModalSelectA"+filterCount;
                // 创建第二个select
                var select2 = createSelect(['>', '>=', '<', '<=', '=', 'like']);
		select2.id = "customModalSelectB"+filterCount;
                // 创建input
                var input = document.createElement("input");
                input.type = "text";
		input.id = "customModalInput"+filterCount;

                // 创建按钮
if(filterCount<2)
{
var addButton = document.createElement("button");
                addButton.textContent = "+";
                addButton.onclick = function() {
                    
                    createFilterRow();
                };

}
                
                // 将所有元素添加到一行中
                filterRow.appendChild(label);
                filterRow.appendChild(select1);
                filterRow.appendChild(select2);
                filterRow.appendChild(input);
if(filterCount<2)
{
filterRow.appendChild(addButton);
 
}   
 filterCount++;           

                // 将一行添加到customModal
                customModal.appendChild(filterRow);
}
else alert("don't allowed more than 4 filters");
}
function createSelect(options) {
                var select = document.createElement("select");
                for (var i = 0; i < options.length; i++) {
                    var option = document.createElement("option");
                    option.value = options[i];
                    option.text = options[i];
                    select.appendChild(option);
                }
                return select;
            }
createFilterRow();




            // 创建OK按钮
            var okBtn = document.createElement("div");
            okBtn.id = "okBtn";
            okBtn.innerHTML = "OK";
            okBtn.style.position = "absolute";
	    okBtn.style.left = "50%";
            okBtn.style.bottom = "20px";
            okBtn.style.cursor = "pointer";
            okBtn.onclick = function() {
		filterCount=filterCount-1;
		for(var i=0; i<filterCount; i++)
{
var j=i+1;
var sel = document.getElementById("customModalSelectA"+j);

var sql = sel.options[sel.selectedIndex].text + " ";
sel = document.getElementById("customModalSelectB"+j);
sql = sql + sel.options[sel.selectedIndex].text + " ";
var inp = document.getElementById("customModalInput"+j);
sql = sql + inp.value + " ";
console.log(sql);
}
                alert("已保存"+filterCount+"个数据");
                document.body.removeChild(customModal);
            };

            // 添加按钮到div
            customModal.appendChild(closeBtn);
            customModal.appendChild(okBtn);

            // 将div添加到body
            document.body.appendChild(customModal);
}



function getQueryVariable(variable)
{
    var query = window.location.search.substring(1);
    var vars = query.split("&");
    for (var i=0;i<vars.length;i++) {
        var pair = vars[i].split("=");
        if(pair[0] == variable){return pair[1];}
    }
    return(false);
}


function menuBtnClicked(clickedButton) {
        // 获取所有按钮
        var buttons = document.querySelectorAll('#leftmenu button');

        // 移除所有按钮的active类
        buttons.forEach(function(button) {
            button.style.fontWeight="normal";
        });

        // 将点击的按钮添加active类
        clickedButton.style.fontWeight="bold";
	
	let id = clickedButton.id;
	for (var i=1;i<10;i++){
		document.getElementById('menucont'+i.toString()).style.display="none";
	}
	var s = 'menucont'+id.replace("menu","");
	document.getElementById(s).style.display="block";
	document.getElementById('savediv').style.display="block";
    }

function getQueryVariable(variable)
{
    var query = window.location.search.substring(1);
    var vars = query.split("&");
    for (var i=0;i<vars.length;i++) {
        var pair = vars[i].split("=");
        if(pair[0] == variable){return pair[1];}
    }
    return(false);
}


function raschet(clickedButton) {
var id = getQueryVariable("id");
window.location.href="../raschet/rrl.php?id="+id;
}

function findOthers(clickedButton) {
var id = getQueryVariable("id");
var x1 = document.getElementsByName('inp_g7')[0].value;
var y1 = document.getElementsByName('inp_g9')[0].value;
console.log(x1,y1);
var div = document.createElement("div");
div.style.width = "50%";
div.style.height = "30%";
div.style.position="absolute";
div.style.top="20%";
div.style.left="35%";
div.style.backgroundColor = "white"; 
var button = document.createElement("button");
button.innerHTML="x";
button.style.position="absolute";
button.style.top="5%";
button.style.right="5%";
button.onclick=function() {
document.body.removeChild(div);
}
var checkbx = document.createElement("input");
checkbx.style.position="absolute";
checkbx.style.top="35%";
checkbx.style.left="5%";
checkbx.type="checkbox";
checkbx.checked="checked";
var span = document.createElement("span");
span.innerHTML="Frequency(MHz)=";
span.style.position="absolute";
span.style.top="32.5%";
span.style.left="15%";
var inp1 = document.createElement("input");
inp1.style.position="absolute";
inp1.style.left="38%";
inp1.style.top="32.5%";
inp1.style.width="100px";
var span2 = document.createElement("span");
span2.innerHTML="Distance(km)=";
span2.style.position="absolute";
span2.style.top="60%";
span2.style.left="15%";
var inp3 = document.createElement("input");
inp3.style.position="absolute";
inp3.style.top="60%";
inp3.style.left="38%";
inp3.style.width="200px";
var okbtn = document.createElement("button");
okbtn.style.position="absolute";
okbtn.style.bottom="5%";
okbtn.style.left="48%";
okbtn.innerHTML = "OK";
okbtn.onclick=function() {
if (checkbx.checked)
{
var f1 = inp1.value;
console.log(f1);
}
var radius = inp3.value;
console.log(radius);
var id = getQueryVariable("id");
window.location.href="../raschet/rrl_multi.php?id="+id+"&f="+f1+"&d="+radius;

}
div.appendChild(okbtn);
div.appendChild(button);
div.appendChild(checkbx);
div.appendChild(span);
div.appendChild(inp1);
div.appendChild(span2);
div.appendChild(inp3);
document.body.appendChild(div);
}


function dms2dec(dms) {
return degreesToRadians(dms);
}

function is_float(value) {
    // Assuming the implementation of is_float function in JavaScript
    // Replace this with your actual implementation or use a library if available
    // For demonstration purposes, a simple example is provided below:
    // Example: "3.14" => 3.14
    return parseFloat(value);
}

function degreesToRadians(degrees) {
    return degrees * (Math.PI / 180);
}

function radiansToDegrees(radians) {
    return radians * (180 / Math.PI);
}

function calculateDistanceAndAzimuth() {
    const x = document.getElementsByName('inp_g8')[0].value;
    const y = document.getElementsByName('inp_g9')[0].value;
    let a = document.getElementsByName('inp_g7')[0].value;
    let b = document.getElementsByName('inp_g10')[0].value;
    const aa = a;
    const bb = b;

    console.log('coord1=', x , ';',y);
    console.log('coord2=', a, ';', b);

    const pow1 = is_float(document.getElementsByName('inp_a5')[0].value.trim().split(' ')[0]);
    const pow2 = is_float(document.getElementsByName('inp_a18')[0].value.trim().split(' ')[0]);
    const ga1 = is_float(document.getElementsByName('inp_a11')[0].value);
    const ga2 = is_float(document.getElementsByName('inp_a24')[0].value);
    const txl1 = is_float(document.getElementsByName('inp_a8')[0].value.trim().split(' ')[0]);
    const txl2 = is_float(document.getElementsByName('inp_a21')[0].value.trim().split(' ')[0]);
    const rxl1 = is_float(document.getElementsByName('inp_a9')[0].value.trim().split(' ')[0]);
    const rxl2 = is_float(document.getElementsByName('inp_a22')[0].value.trim().split(' ')[0]);

    const eirp1 = pow1 + ga1 - txl1;
    const eirp2 = pow2 + ga2 - txl2;
	console.log('eirp=power+gain+txloss');
    console.log('eirp1=',eirp1);
    console.log('eirp2=',eirp2);

    const f1 = is_float(document.getElementsByName('inp_a1')[0].value.trim().split(' ')[0]);
    const f2 = is_float(document.getElementsByName('inp_a14')[0].value.trim().split(' ')[0]);
    const theta = a - b;

    const distance = 60 * 1.1515 * (
        Math.acos(
            (Math.sin(degreesToRadians(x)) * Math.sin(degreesToRadians(y))) +
            (Math.cos(degreesToRadians(x)) * Math.cos(degreesToRadians(y)) * Math.cos(degreesToRadians(theta)))
        ) * radiansToDegrees(1)
    );

    const d = distance * 1.609344;
	console.log('distance=60*1.1515*(acos(sin(x)*sin(y)+cos(x)*cos(y)*cos(f1-f2)))*1.609344');
    console.log('distance=',d);

    const afsl = 32.4 + 20 * Math.log10(f1) + 20 * Math.log10(d);
    const bfsl = 32.4 + 20 * Math.log10(f2) + 20 * Math.log10(d);
    const arsl = eirp1 - afsl + ga2 - rxl2;
    const brsl = eirp2 - bfsl + ga1 - rxl1;
console.log('fsl=32.4+20*lg(f)+20*lg(d)');
console.log('fsl1=',afsl);
console.log('fsl2=',bfsl);
console.log('rsl1=eirp1-fsl1+gain2-rxloss2');
console.log('rsl1=eirp2-fsl2+gain1-rxloss1');
console.log('rsl1=',arsl);
console.log('rsl2=',brsl);

}



if (document.getElementById('checkAll')!=null)
{
document.getElementById('checkAll').onchange=function() {
for(var i=1;i<16;i++)
{
if (document.getElementById('check'+i)!=null)
document.getElementById('check'+i).checked = document.getElementById('checkAll').checked;
}
}
}
else if (document.getElementById('calcErp1')!=null)
{
document.getElementById('calcErp1').onclick = function() {
    // eirp1 = pow1 + ga1 - txl1
    var erp = document.getElementsByName('inp_a12')[0];
    var powe = document.getElementsByName('inp_a5')[0];
    var ga = document.getElementsByName('inp_a11')[0];
    var txl = document.getElementsByName('inp_a9')[0];

    var p = parseInt(powe.value.trim().split(' ')[0]);
    var g = parseInt(ga.value.trim().split(' ')[0]);
    var tx = parseInt(txl.value.trim().split(' ')[0]);
    erp.value = (p + g - tx) + " dBW";
calculateDistanceAndAzimuth();
};

document.getElementById('calcErp2').onclick=function() {
alert('clicked');
}
}

// sliding pages
function goToSecondPage() {
    document.getElementById('firstpage').style.transform = 'translateX(-100%)'; // Move first page to the left
    document.getElementById('secondpage').style.transform = 'translateX(0)'; // Slide second page into view
}
function goToFirstPage() {
    document.getElementById('age-and-gender-section').style.transform = 'translateX(-100%)'; // Move age and gender section to the left
    document.getElementById('firstpage').style.transform = 'translateX(0)'; // Slide first page into view
}

// Function to go to the first page
function goToFirstPage() {
    document.getElementById('secondpage').style.transform = 'translateX(100%)'; // Slide second page out
    document.getElementById('firstpage').style.transform = 'translateX(0)'; // Slide first page into view
}

// Function to go back to the first section (age and gender section)
function goToAgeAndGenderSection() {
    document.getElementById('firstpage').style.transform = 'translateX(100%)'; // Slide first page out
    document.getElementById('secondpage').style.transform = 'translateX(100%)'; // Slide second page out
    document.getElementById('age-and-gender-section').style.transform = 'translateX(0)'; // Slide age and gender section back into view
}
// endd

// skinconcern
function changeheadingstext6() {
    var newText = " A state where the skin lacks  <br> sufficient water, leading to a dull  <br> appearance and reduced elasticity.  <br> It can affect any skin type and is  <br> often worsened by environmental factors.";
    document.getElementById("paragraph5").innerHTML = newText;
}
function changeheadingstext7() {
    document.getElementById('paragraph5').innerHTML = 'The surface quality of the skin,  <br> which can be smooth, rough, or  <br> uneven. Skin texture can be influenced  <br> by   aging, acne scars, sun damage, and  <br> overall skin health.';
}
function changeheadingstext8() {
    document.getElementById('paragraph5').innerHTML = ' The appearance of shadows or  <br> discoloration under the eyes, often  <br> due to factors like genetics, fatigue,  <br> aging, or dehydration.';
}
function changeheadingstext9() {
    document.getElementById('paragraph5').innerHTML = ' A condition characterized by  <br> discoloration or variations in skin  <br> color, often resulting from sun damage,  <br> hormonal changes, or skin conditions  <br> like hyperpigmentation.';
}
function changeheadingstext10() {
    document.getElementById('paragraph5').innerHTML = 'Refers to clogged pores due to  <br> excess oil, dead skin cells, and  <br> impurities, which can lead to  <br> blackheads, whiteheads, and acne.';
}
function changeheadingstext11() {
    document.getElementById('paragraph5').innerHTML = ' Skin that easily reacts to products  <br> or environmental changes, leading to  <br> redness, irritation, or discomfort.  <br> Sensitive skin often requires gentle,  <br> non-irritating care.';
}
function changeheadingstext12() {
    document.getElementById('paragraph5').innerHTML = ' The onset of visible signs of aging, <br> such as fine lines, wrinkles, and sagging <br> skin, often triggered by factors like sun <br> exposure, lifestyle choices, and genetics.';
}
function changeheadingstext13() {
    document.getElementById('paragraph5').innerHTML = 'Dullness refers to a lack of  radiance <br> and vibrancy in the complexion, often <br> resulting in a tired or lifeless appearance. <br> It can manifest as dry, patchy, or uneven skin tone, typically caused by factors such as  dehydration, poor circulation, dead skin cell  buildup, and lifestyle choices.';
}

// skintype
function changeheadingstext1() {
    var newText = "Normal Skin Care Tips<br>For all skin types, hydration is key.<br>Remember to apply sunscreen daily.";
    document.getElementById("paragraph1").innerHTML = newText;
}

function changeheadingstext2() {
    var newText = "Dry skin is marked by <br> a lack of moisture, leading to a rough texture, flakiness, <br> and sometimes tightness or irritation.  It may appear dull <br> and can be prone to  redness and sensitivity, often requiring <br> extra hydration and nourishing products.";
    document.getElementById("paragraph1").innerHTML = newText;
}
function changeheadingstext3() {
    var newText = " Oily skin is characterized <br> by an excess production of sebum, resulting <br> in a shiny appearance, enlarged pores, and a <br> tendency to develop acne or blemishes. It often <br> requires products that help control oil and prevent <br> breakouts.";
    document.getElementById("paragraph1").innerHTML = newText;
}
function changeheadingstext4() {
    var newText = " Sensitive skin is prone to irritation, <br> redness, and reactions to products or <br> environmental factors. It often feels <br> tight or itchy and may react adversely to <br> certain ingredients, necessitating gentle, <br> hypoallergenic skincare solutions.";
    document.getElementById("paragraph1").innerHTML = newText;
}
function changeheadingstext5() {
    var newText = " Combination skin features both oily <br> and dry areas on the face, typically with <br> an oily T-zone (forehead, nose, and chin) <br> and drier cheeks. This skin type requires <br> a balanced skincare approach to address <br> the varying needs of different areas.";
    document.getElementById("paragraph1").innerHTML = newText;
}




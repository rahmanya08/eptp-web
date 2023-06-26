//CONVERT TO PDF
// $(document).ready(function(){
//     $('#btn-print').click(function () {
//             $('#card').printThis();
//     });
// });   

//2
const pdf_btn = document.querySelector('#toPDF');
const test_card = document.querySelector('#card');

const toPDF = function(test_card) {
    
    const html_code = `
    <link rel="stylesheet" href="css/dash-theme.css">
    <div class="test-card">${test_card.innerHTML}</div>
    `;
    
    const new_window = window.open('','','width=800, height=1000, top=0' );
    new_window.document.write(html_code);
    setTimeout(() => {
        new_window.print();
        new_window.close();
        
    }, 200);
}


pdf_btn.onclick = ()=>{
    toPDF(test_card);
}



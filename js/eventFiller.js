var event_details = 
{
    title: "ICDL ASIA DIGITAL CHALLENGE 2021 IS BACK!",
    startDate: "2021-04-07",
    endDate: "2021-04-07",
    description: 
    `
        <p>REGISTER NOW !&nbsp;<br>
        ✅To expose contestants to emerging technologies, data analytics, design, and the use of office application tools.<br>
        ✅To gain valuable experience in an international competition.<br>
        ✅3 rounds of competition; Preliminary, National and Grand Final<br>
        ✅Winner who can win prizes worth up to USD $150</p><p>Challenge yourself and be recognised!</p><p>Click the link to register :&nbsp;
        <a data-saferedirecturl="https://www.google.com/url?q=https://forms.gle/KLXRcwJUsDrbTBQW7&amp;source=gmail&amp;ust=1617854170082000&amp;usg=AFQjCNHbCDXTFLQj66eIZTSuHy3SYxJ6WA" href="https://forms.gle/KLXRcwJUsDrbTBQW7" target="_blank">
        https://forms.gle/<wbr />KLXRcwJUsDrbTBQW7</a><br>
        For details :&nbsp;<a data-saferedirecturl="https://www.google.com/url?q=http://wassap.my/0145118452/&amp;source=gmail&amp;ust=1617854170082000&amp;usg=AFQjCNGUVX20DfKK5w9GYQjBc06eKvxU2Q" href="http://wassap.my/0145118452/" target="_blank">wassap.my/0145118452/</a><br>
        Read more about competition at :&nbsp;
        <a data-saferedirecturl="https://www.google.com/url?q=https://icdlasia.org/digital-challenge-2021/&amp;source=gmail&amp;ust=1617854170082000&amp;usg=AFQjCNFSGbKsXbyrZ8XODig5Fp4vZCCtCg" href="https://icdlasia.org/digital-challenge-2021/" target="_blank">https://icdlasia.org/digital-
        <wbr />challenge-2021/</a><br>Competition outline can be find at :&nbsp;
        <a data-saferedirecturl="https://www.google.com/url?q=https://bit.ly/2Qsnh1r&amp;source=gmail&amp;ust=1617854170082000&amp;usg=AFQjCNFIxfMNsoRaa9ng5N9Y3Q7hgiftbQ" href="https://bit.ly/2Qsnh1r" target="_blank">https://bit.ly/2Qsnh1r</a>
    `,
    mode: "virtual"
}

document.querySelector("#eventTitle").value = event_details.title;
document.querySelector("#startDate").value = event_details.startDate;
document.querySelector("#endDate").value = event_details.endDate;

ClassicEditor
    .create(document.querySelector('#description'))
    .then(editor => {
        editor.setData(event_details.description);
    })
    .catch(error => {
        console.error(error);
    });

var radioButtons = document.querySelectorAll(".event-mode");
for(var i = 0; i < radioButtons.length; i++)
    if(radioButtons[i].value == event_details.target)
    {
        radioButtons[i].checked = true;
        break;
    }
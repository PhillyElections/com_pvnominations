<?php

// no direct access
defined('_JEXEC') or die('Restricted access');

$html='
<h4>
    Nomination Petitions (Major Political Parties)</h4>
<p>
    Nomination petitions are filed so that one&rsquo;s name shall be printed upon the official primary ballot. Nomination petitions for municipal offices must be filed at the Philadelphia County Board of Elections at City Hall Room 142. Nomination petitions for state and federal offices must be filed with the Secretary of the Commonwealth in Harrisburg. Nomination petitions must be received no later than 5:00 PM on the tenth Tuesday prior to the primary. Nomination petitions must be:</p>
<ul>
    <li>
        Circulated not prior to the thirteenth Tuesday before the primary and not later than the tenth Tuesday prior to the primary.</li>
    <li>
        Filed in the form prescribed by the Secretary of the Commonwealth, including notarization in the designated places on said petition.</li>
    <li>
        Signed by duly registered and enrolled members of such party who are qualified electors of the state or political district within which the nomination is to be made or election is to be held.</li>
    <li>
        Each petition shall include the affidavit of the circulator of each sheet, which must be signed by the circulator stating that he or she is a qualified elector duly registered and enrolled as a member of the designated party referred to in said petition.</li>
</ul>
<p>
    <strong>Number of signers and filing fee required for nomination petitions of candidates at primaries:</strong></p>
<table border="1" cellpadding="5" cellspacing="0" class="basic-table" style="width: 100%;">
    <thead>
        <tr>
            <th>
                Office</th>
            <th>
                Required Number of Signatures</th>
            <th>
                Filing Fee</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                President of the United States</td>
            <td>
                Two thousand</td>
            <td>
                $200</td>
        </tr>
        <tr>
            <td>
                United States Senate</td>
            <td>
                Two thousand</td>
            <td>
                $200</td>
        </tr>
        <tr>
            <td>
                Representative in Congress</td>
            <td>
                One thousand</td>
            <td>
                $150</td>
        </tr>
        <tr>
            <td>
                Governor</td>
            <td>
                Two thousand including at least one hundred from each of at least ten counties</td>
            <td>
                $200</td>
        </tr>
        <tr>
            <td>
                Lieutenant Governor</td>
            <td>
                Two thousand including at least one hundred from each of at least five counties</td>
            <td>
                $200</td>
        </tr>
        <tr>
            <td>
                Attorney General</td>
            <td>
                One thousand including at least one hundred from each of at least five counties</td>
            <td>
                $200</td>
        </tr>
        <tr>
            <td>
                Auditor General</td>
            <td>
                One thousand including at least one hundred from each of at least five counties</td>
            <td>
                $200</td>
        </tr>
        <tr>
            <td>
                ---</td>
            <td>
                ---</td>
            <td>
                ---</td>
        </tr>
        <tr>
            <td>
                Committeeperson</td>
            <td>
                Ten</td>
            <td>
                $0</td>
        </tr>
    </tbody>
</table>
<h4>
    Nomination Papers (Minor Political Parties and Independent Candidates)</h4>
<p>
    Nomination papers are filed so that one&rsquo;s name shall be printed upon the official General Election ballot. Nomination papers for municipal offices must be filed at the Philadelphia County Board of Elections at City Hall Room 142. Nomination petitions for state and federal offices must be filed with the Secretary of the Commonwealth in Harrisburg. Nomination papers must be received no later than 5:00 PM on August 1<sup>st</sup> or the first Monday in August if August 1<sup>st</sup> falls on a Saturday or Sunday. Nomination papers must be:</p>
<ul>
    <li>
        Circulated not prior to the tenth Wednesday before the primary and not later than August 1<sup>st</sup> or the first Monday in August if August 1<sup>st</sup> falls on a Saturday or Sunday.</li>
    <li>
        Filed in the form prescribed by the Secretary of the Commonwealth, including notarization in the designated places on said petition.</li>
    <li>
        Signed by qualified electors of the state or political district within which the nomination is to be made or election is to be held.</li>
    <li>
        Each nomination paper shall include the affidavit of the circulator of each sheet, which must be signed by the circulator.</li>
    <li>
        Each nomination paper shall include an affidavit of each candidate nominated therein.</li>
</ul>
<p>
    In order to be eligible to be the candidate of a political body or as an Independent candidate, one may not be registered and enrolled as a member of a major political party between thirty (30) days before the primary and extending through the general or municipal election of that same year.</p>
<p>
    The number of signers required for nomination papers shall be at least equal to 2 percent of the largest entire vote cast for any officer elected at the last preceding election in said electoral district for which said nomination papers are to be filed. The number of signers shall not be less than the number of signers required for nomination petitions for party candidates for the same office.</p>
<p>
    <strong>FILING FEES TO BE PAID AT TIME OF FILING NOMINATION PETITIONS OR NOMINATION PAPERS </strong></p>
<p>
    The filing fee for candidates who file nomination papers shall be the same as candidates who file nomination petitions for the same office.</p>
<p>
    The County Board of Elections only accepts certified checks and money orders.</p>';

$css ='
@page {
    sheet-size: Letter;
    margin-left: 1in;
    margin-right: 1in;
    margin-top: 1in;
    margin-bottom: 1in;
}


body {
    line-height: 1;
    font-size:12px;
}

blockquote,
q {
    quotes: none;
}

blockquote:before,
blockquote:after,
q:before,
table {
    border-collapse: collapse;
    border-spacing: 0;
}

body {
    font-size: 11px;
    font-family: "calibri";
}

div,
p {
    line-height: 1.25em;
}

h2,
h3, h4 {
    font-weight: bold;
    font-size: 1.5em;
}

table {
    width: 100%;
}

table.basic-table tr {
    border-bottom: .25px solid black;
    border-top: .25px solid black;
}

table.basic-table td,
table.basic-table th {
    font-size: 1em;
    line-height: 1.75em;
    border: .25px solid black;
    text-align: center;
    vertical-align: middle;
}


table.basic-table th {
    font-weight: bold;
    background-color: grey;
}

table.basic-table td {
    font-size: 1em;
    padding: .33em .33em .33em .33em;
}

table.basic-table th {
    padding: .33em;
}

table.basic-table td:nth-child(1),
table.basic-table th:nth-child(1) {
    width: 30%;
    font-weight: bold;
}

table.basic-table td:nth-child(2),
table.basic-table th:nth-child(2) {
    width: 60%;
}

table.basic-table td:nth-child(3),
table.basic-table th:nth-child(3) {
    width: 10%;
}

.text-center {
    text-align: center;
}

';

jimport('mpdf.mpdf.mpdf');

$filename = 'Nomination_Petition_Instructions.pdf';

//Create an instance of the class:
$mpdf = new mPDF();

$mpdf->SetTitle('Nomination Petition Instructions');

// Add styles
$mpdf->WriteHTML($css, 1);

// Write some HTML code:
$mpdf->WriteHTML($html, 2);

// Output a PDF file directly to the browser
$mpdf->Output($filename, JRequest::getVar('download') == 'true' ? 'D' : 'I');

exit();

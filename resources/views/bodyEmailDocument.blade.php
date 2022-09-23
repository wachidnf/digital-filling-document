<table>
    <tr>
        <td>Dear <?=$email_to[0]?>,</td>
    </tr>
    <tr></tr>
    <tr>
        <td>Kepada Bapak/ Ibu, 
            @if (count($email_to) > 1)
                @foreach ($email_to as $key => $value)
                    @if ($key == 0)
                    <?=$value?>
                    @else
                    , <?=$value?>
                    @endif
                @endforeach
            @else
                <?=$email_to[0]?>
            @endif
            telah mengirimkan dokumen sebagai berikut :
        </td>
    </tr>
    <tr></tr>
    <tr>
        <td>Nomor Dokumen : <?=$doc_no?></td>
    </tr>
    <tr></tr>
    <tr></tr>
    <tr>
        <td>
            <i>Jika Anda bukan penerima yang ditujukan diatas, Anda tidak berhak untuk mengakses informasi pada lampiran dan harus segera menghapus email ini.</i>
        </td>
    </tr>
    <tr></tr>
    <tr></tr>
    <tr>
        <td>
            <i>Simpan alamat email ini pada Address Book email Anda agar tidak masuk kedalam Junk Mail / Spam.</i>
        </td>
    </tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>
    <tr>
        <td>Terima Kasih,</td>
    </tr>
    <tr></tr>
    <tr></tr>
    <tr><td><?=$pt_name != '' ? strtoupper($pt_name) : 'ADMIN SI ARDI'?></td></tr>
</table>

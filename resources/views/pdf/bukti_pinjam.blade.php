<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table style="border-collapse: collapse;">
        <tr>
            <th colspan="4" >Akashic</th>
        </tr>
        <tr>
            <th colspan="4" >Library</th>
        </tr>
        <tr>
            <th colspan="4" >086828981828</th>
        </tr>
        <tr>
            <th colspan="4" ><hr></th>
        </tr>
        <tr>
            <th style="border: 1px solid black; padding: 5px;">No</th>
            <th style="border: 1px solid black; padding: 5px;">Buku</th>
            <th style="border: 1px solid black; padding: 5px;">Tanggal Pinjam</th>
            <th style="border: 1px solid black; padding: 5px;">Tanggal Kembali</th>
        </tr>
        @php
            $no=1;
        @endphp
        @foreach ($data as $i)
            <tr>
                <td style="border: 1px solid black; padding: 5px;">{{ $no++ }}</td>
                <td style="border: 1px solid black; padding: 5px;">{{ $i->buku->judul_buku }}</td>
                <td style="border: 1px solid black; padding: 5px;">{{ $i->tanggal_pinjam }}</td>
                <td style="border: 1px solid black; padding: 5px;">{{ $i->tanggal_kembali }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid black; padding: 5px;" colspan="2">Peminjam</td>
                <td style="border: 1px solid black; padding: 5px;" >:</td>
                <td style="border: 1px solid black; padding: 5px;">{{ $i->siswa->nama }}</td>
            </tr>
            <tr>
                <td colspan="4">kembalikan tepat waktu ,
                <u><b>jika terlambat denda 1 jt per hari</b></u>
                </td>
            </tr>
            <tr>
                
            </tr>
            <tr>
                <td >
                    Kediri, ...............
                    <br>
                    Petugas
                    <br>
                    <br>
                    <div style="width: 100%; display: flex; flex-direction: column; margin-right: 5%;">
                        <label style="margin-top: 2%;">Kediri, {{  now() }} </label>
                        <div id="qrcode"></div>
                        <label style="margin-top: 2%;">{{Auth::user()->name}} </label>
                    </div>
                    <br>
                </td>
                <td colspan="2" ></td>
                <td>
                    Kediri, ...............
                    <br>
                    Peminjam
                    <br>
                    <br>
                    <br>
                    {{ $i->siswa->nama }}
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>

<!-- Include jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include qrcode.js library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js" integrity="sha512-CNgIRecGo7nphbeZ04Sc13ka07paqdeTu0WR1IM4kNcpmBAUSHSQX0FslNhTDadL4O5SAGapGt4FodqL8My0mA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!--JavaScript to generate QR Code -->
<script>
    $(document).ready(function(){
        //Generate QR Code
        var username = "{{ Auth::user()->name }} \n"+" Tanggal : {{ now() }}"; //mendapatkan nama pengguna dari auth
        var qrtext = "Ditanda tangan di PT PENJUALAN\n"
        + username;
        varqr = new QRCode(document.getElementById("qrcode"), {
            text: qrtext,
            width: 90, //Set the width of QR code
            height: 90//Set the height of QR code
        });

        // Menunda pencetakan dengan setTimeout
        setTimeout(function() {
            window.print(); // Mencetak Saat halaman dimuat
        }, 500); // Menunda pencetakan selama 500 milidetik (0.5 detik) 
    });
</script>
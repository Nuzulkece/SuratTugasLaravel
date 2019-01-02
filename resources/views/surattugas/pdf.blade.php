<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>07.{{ $surattugas->nomor_surat }}</title> 
    </head>
    <body>
        <?php 
            $bulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
            $tanggal_buat = explode('-', date('d-m-Y', strtotime($surattugas->created_at)));
            $tanggal_tgs = explode('-', date('d-m-Y', strtotime($surattugas->tanggal_tugas)));
            $t_buat = (int) $tanggal_buat[1] - 1;
            $t_tugas = (int) $tanggal_tgs[1] - 1;
            $format_buat = $tanggal_buat[0] . ' ' . $bulan[$t_buat] . ' ' . $tanggal_buat[2];
            $format_tugas = $tanggal_tgs[0] . ' ' . $bulan[$t_tugas] . ' ' . $tanggal_tgs[2];

            $tanggal_end = explode('-', date('d-m-Y', strtotime($surattugas->tanggal_akhir)));
            $t_end = (int) $tanggal_end[1] - 1;
            $format_end = $tanggal_end[0] . ' ' . $bulan[$t_end] . ' ' . $tanggal_end[2];

            
            $nono = "1";
            $nomorurut = (int)$nono;
            $nomorurut2 = (int)$nono;
            $jumlahpegawai = $surattugas->pegawais->count();
            $jumlahtujuan = $surattugas->tujuans->count();
        ?>

        <center><img src="../public/assets/images/kop-surat.png"></center>
        <hr>
        <p align="right">{{ $surattugas->nomor_polisi}}</p>
        <p align="center"><u><b>SURAT TUGAS</b></u>
        <br>
            No.07.{{ $surattugas->nomor_surat }}
        </p>
        <br>
        <p style="padding-left: 50px; padding-right: 50px;">&nbsp;&nbsp;Diberikan kepada:<br>
            <span style="margin-left: 40px;">
                <table style="line-height: 20px; margin-left: 20">
                    
                    <tbody>
                        <tr>
                        <td valign=top>Nama</td>
                        <td valign=top><span style="margin-left: 40px;">: &nbsp;</span></td>
                        <td valign=top>  
                            @foreach ($surattugas->pegawais as $pegawai)
                            @if($jumlahpegawai != 1)
                                <?php 
                                    echo $nomorurut.". ".$pegawai->pegawai;
                                    $tes="1";
                                    $nomorurut= (int)$nomorurut+(int)$tes;
                                ?>
                                <br>
                            @else
                                <?php 
                                    echo $pegawai->pegawai; 
                                ?>
                            @endif    
                            @endforeach                            
                        </td>
                        </tr>

                        <tr>
                           <td valign=top>Jabatan</td>
                            <td valign=top><span style="margin-left: 40px;">:</span></td>
                            <td valign=top>  
                                @if($surattugas->jabatan != null)
                                    {{$surattugas->jabatan}}
                                @else
                                    -
                                @endif
                            </td>
                        </tr>

                        <tr>
                           <td valign=top>Tanggal</td>
                            <td valign=top><span style="margin-left: 40px;">:</span></td>
                            <td valign=top>  
                                @if($surattugas->tanggal_tugas == $surattugas->tanggal_akhir)
                                    {{ $format_tugas }}
                                @else
                                    {{ $format_tugas }} s/d {{ $format_end }}
                                @endif
                            </td>
                        </tr>

                        <tr>
                           <td valign=top>Kegiatan</td>
                            <td valign=top><span style="margin-left: 40px;">:</span></td>
                            <td valign=top>  {{ $surattugas->kegiatan }}</td>
                        </tr>

                        <tr>
                        <td valign=top>Tujuan</td>
                        <td valign=top><span style="margin-left: 40px;">: &nbsp;</span></td>
                        <td valign=top>  
                            @foreach ($surattugas->tujuans as $tujuan)
                            @if($jumlahtujuan != 1)
                                <?php 
                                    echo $nomorurut2.". ".$tujuan->tujuan;
                                    $tes="1";
                                    $nomorurut2= (int)$nomorurut2+(int)$tes;
                                ?>
                                <br>
                            @else
                                <?php 
                                    echo $tujuan->tujuan;
                                ?>
                            @endif
                            @endforeach
                            
                        </td>
                        </tr>
                    </tbody>
                </table>  
                <br>        
                
                <p align="left" style="padding-left: 12px;">
                Demikian surat tugas ini dibuat untuk dapat dilaksanakan sebagaimana mestinya.
                </p>            
                
                <p align="left" style="padding-left: 12px;">
                    Surabaya, {{ $format_buat }}<br>

                    <table cellpadding="10" width="100%">
                        <tbody>
                            <tr>
                                <td><b>PT. SINAR RODA UTAMA</b></td>
                                <td><center><b><!-- tujuan --></b></center></td>
                            </tr>
                            <tr>
                                <td><b><u><br><br><br>Herman Harsono<br></u>Branch Office Manager</b></td>
                                <td><br><br><br><b><center><!-- (...........................................) --></center></b></td>
                            </tr>
                        </tbody>
                    </table>              
                </p>
            </span>
        </p>
    </body>
</html>

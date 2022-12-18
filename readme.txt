About Apps

Sispenma (Sistem Penjadwalan Mata Pelajaran) adalah sebuah sistem penjadwalan berbasis web 
yang digunakan untuk membuat sebuah jadwal secara otomatis dengan mengimplementasikan 
algoritma ant colony optimization untuk mengoptimalkan jadwal dengan cara memerhatikan 
batasan-batasan (constraint) yang telah ditentukan sebelumnya. contoh batasan yang ada yaitu:
1.	Tidak ada bentrok pada jadwal mengajar guru, dimana guru hanya boleh mengajar satu kelas 
    dalam satu waktu.
2.	Tidak ada bentrok pada jadwal penggunaan ruangan, dimana ruangan khusus selain ruang kelas 
    hanya dapat digunakan oleh satu kelas dalam satu waktu. misalnya hanya boleh ada satu kelas 
    yang menggunakan lab komputer dalam satu waktu. 
3.	Tidak ada kesalahan pada ampu guru, dimana guru harus mengajar sesuai dengan mata pelajaran 
    yang telah ditentukan, dan jumlah ampu guru per minggu harus sesuai dengan yag telah ditentukan. 
    Misalnya guru A harus mengajar sebanyak 20 jam dalam waktu satu minggu, maka 20 jam tersebut 
    harus dapat teralokasi dengan tepat.
4.	Tidak ada kesalahan dalam jumlah mata pelajaran, dimana setiap kelas harus dapat memenuhi jumlah 
    mata pelajaran per minggu sesuai dengan yang telah ditentukan. Misalnya setiap kelas memiliki 
    waktu ampu sebanyak 45 jam dalam satu minggu, dan terdapat 24 mata pelajaran yang harus di ampu 
    dengan masing-masing mata pelajaran memiliki beban atau jumlah waktu tertentu, maka semua mata 
    pelajaran harus dialokasikan dengan baik sesuai dengan alokasi waktu dan bebannya masing-masing.
5.	Tidak ada guru yang mengajar pada jam khusus yang diminta guru tersebut.
Dengan adanya sistem ini, diharapkan tidak ditemukan lagi bentrok pada mata pelajaran yang dapat
mengganggu proses belajar mengajar di sekolah.
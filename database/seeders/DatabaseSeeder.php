<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['id'=>2,'name'=>'Ngô Anh Quốc', 'email'=>'ngoanhquoc@gmail.com','email_verified_at'=> null, 'password'=> bcrypt('12345678'),'role'=>1 ,'remember_token'=> 'hJ5bPBxgp9UsxQhEyS0BNTSmUTkaEz40lZ2evGmzsa6ZIQSYTSRxto1RejYq','created_at'=> '2021-08-16 20:56:18','updated_at'=> NULL],
            ['id'=>3,'name'=>'Nguyễn Văn Tưởng', 'email'=>'devnguyen27@gmail.com','email_verified_at'=> null, 'password'=> bcrypt('12345678'),'role'=>1 ,'remember_token'=> 'hJ5bPBxgp9UsxQhEyS0BNTSmUTkaEz40lZ2evGmzsa6ZIQSYTSRxto1RejYq','created_at'=> '2021-08-16 20:56:18','updated_at'=> NULL],
        ]);

        DB::table('danhmuc')->insert([
            ['id' => 1, 'name'=>'Chăm sóc da mặt','img'=>'photo-1635608885.jpg','slug'=> Str::slug('Chăm sóc da mặt', '-'), 'loai'=>'1'],
            ['id' => 2, 'name'=>'Điều trị mụn, sẹo','img'=>'photo-1635608926.jpg','slug'=> Str::slug('Điều trị mụn, sẹo', '-'), 'loai'=>'1'],
            ['id' => 3, 'name'=>'Dịch vụ trị nám, tàn nhang','img'=>'photo-1635608979.jpg', 'slug'=> Str::slug('Dịch vụ trị nám', '-'), 'loai'=>'1'],
            ['id' => 4, 'name'=>'Làm trẻ hóa da','img'=>'photo-1635609024.jpg','slug'=> Str::slug('Làm trẻ hóa da', '-'), 'loai'=>'1'],
            ['id' => 5, 'name'=>'Dịch vụ massage','img'=>'photo-1635609047.jpg','slug'=> Str::slug('Dịch vụ massage', '-'), 'loai'=>'1'],
            ['id' => 6, 'name'=>'Dịch vụ giảm béo','img'=>'photo-1635609071.jpg','slug'=> Str::slug('Dịch vụ giảm béo', '-'), 'loai'=>'1'],
            ['id' => 7, 'name'=>'Làm đẹp','img'=>'photo-1635609118.jpg','slug'=> Str::slug('Làm đẹp', '-'), 'loai'=>'2'],
            ['id' => 8, 'name'=>'Trắng da','img'=>'photo-1635609158.jpg','slug'=> Str::slug('Trắng da', '-'), 'loai'=>'3'],
            ['id' => 9, 'name'=>'Maybelline','img'=>'photo-1635609158.jpg','slug'=> Str::slug('maybelline', '-'), 'loai'=>'4'],
        ]);
        DB::table('sanpham')->insert([
            ['id'=>1,'iddanhmuc'=>1,'idthuonghieu'=>9,'name'=>'LA MER The Treatment Lotion Hydrating Mask - Mặt nạ tái tạo da', 'slug'=> Str::slug('LA MER The Treatment Lotion Hydrating Mask - Mặt nạ tái tạo da', '-'),'img'=>'["profile-photo-1635519235.png","profile-photo-1635519265.png","profile-photo-1635519312.png"]','soluotmua' => '150', 'tonkho' => '300', 'dongia' => '590000','mota'=> 'Mặt nạ “siêu dưỡng da” được ngâm trong 30ml The Treatment Lotion ngay lập tức mang đến sự tăng cường hydrat hoá giúp chữa lành,','noidung'=>'Mặt nạ tấm với công nghệ ôm sát của Nhật Bản và hàng triệu sợi vi mô tinh khiết độc đáo tăng cường sự tập trung của quá trình hydrat hóa chữa lành, làm rạng rỡ, đầy đặn và truyền vào da một nguồn năng lượng mạnh mẽ có tác dụng hồi sinh làn da chỉ trong tíc tắc.

            - Kết cấu vi mô độc đáo của các sợi phản lực tinh khiết nhẹ nhàng ôm lấy làn da để chúng ta có thể hoạt động trong khi sử dụng mặt nạ.

            - “Thuốc tiên” Miracle Broth tái tạo và phục hồi các chức năng tự nhiên của da, làm mờ các khuyết điểm, làm mịn và làm đầy rãnh nhăn, se khít lỗ chân lông.

            - Phức hợp tái tạo lên men độc quyền với sự kết hợp của tảo và 73 khoáng chất từ biển cung cấp độ ẩm sâu và bổ sung các tế bào da.

            - Làm dịu làn da kích ứng, mẩn đỏ và cải thiện kết cấu da.

            Giải pháp cho: da khô, xỉn màu, mất kết cấu, da lão hoá, chảy sệ...

            Công dụng chính: dưỡng ẩm và giữ ẩm, dưỡng sáng và rạng rỡ, làm dịu kích ứng, làm đầy các rãnh và xoá mờ nếp nhăn...

            Phù hợp với mọi loại da, kể cả da nhạy cảm, kích ứng.

            Sản xuất tại Nhật Bản' ,'trangthai'=>1,'created_at'=> '2021-08-16 20:56:18','updated_at'=> NULL],

            ['id'=>2,'iddanhmuc'=>2,'idthuonghieu'=>9,'name'=>'LA MER The Moisturizing Cream - Kem dưỡng ẩm da khô, hư tổn', 'slug'=> Str::slug('LA MER The Moisturizing Cream - Kem dưỡng ẩm da khô, hư tổn', '-'),'img'=>'["profile-photo-1635519265.png","profile-photo-1635519265.png","profile-photo-1635519312.png"]','soluotmua' => '150', 'tonkho' => '300', 'dongia' => '590000','mota'=> 'Một loại kem giàu dưỡng chất cùng với độ ẩm sâu nhất giúp ngay lập tức mang lại làn da ẩm mọng,','noidung'=>'Với khả năng hydrat hóa cao và cải thiện sự khô da chỉ trong ba ngày, kem dưỡng siêu giàu ẩm này truyền vào da một độ ẩm sâu tức thì và kéo dài cả ngày. Giúp làm dịu rõ rệt làn da nhạy cảm và kích ứng.

             - Chứa thành phần tái tạo tế bào Miracle Broth™ - "thuốc tiên" huyền thoại có trong mọi sản phẩm La Mer - truyền vào da những lợi ích tái tạo có nguồn gốc từ biển, chữa lành và làm đầy, làm mịn các các nếp nhăn, để lộ sự rạng rỡ mới cho làn da.

             - Chiết xuất trà chanh - thành phần chống oxy hoá mạnh mẽ của La Mer - tăng cường hàng rào tự nhiên của da, bảo vệ chống lại sự căng thẳng và ô nhiễm môi trường cho một làn da sáng và tinh khiết.

             - Sữa chữa các khuyết điểm trên da như nếp nhăn, sẹo thâm và thu nhỏ lỗ chân lông.

             - Mang lại sự săn chắc, khoẻ mạnh, đầy sức sống và phục hồi làn da.

             Phù hợp cho mọi loại da, đặc biệt là các loại da khô, siêu khô, da tổn thương do kem trộn hay da nhạy cảm sau điều trị.

             Không chứa Paraben, Phthalates, Sulfates, Sulfites.' ,'trangthai'=>1,'created_at'=> '2021-08-16 20:56:18','updated_at'=> NULL],

            ['id'=>3,'iddanhmuc'=>3,'idthuonghieu'=>9,'name'=>'LA MER The Lip Volumizer - Son dưỡng làm dày môi', 'slug'=> Str::slug('LA MER The Lip Volumizer - Son dưỡng làm dày môi', '-'),'img'=>'["profile-photo-1635519265.png","profile-photo-1635519265.png","profile-photo-1635519312.png"]','soluotmua' => '150', 'tonkho' => '300', 'dongia' => '590000','mota'=> 'Son dưỡng làm mềm và làm mờ các rãnh nhăn trên môi, đồng thời làm căng mọng bờ môi,','noidung'=>'Một công thức không chỉ làm đầy và hoàn thiện đôi môi, mà còn giúp bảo vệ chống lại thiệt hại trong tương lai bởi vì làn da môi mỏng manh của chúng ta đặc biệt dễ bị tổn thương bởi các tác nhân gây hại từ môi trường.

            Phương pháp điều trị huyền thoại của La Mer Miracle Broth™ được bào chế với các chất chống oxy hóa giúp bảo vệ đôi môi, ngay lập tức làm đầy đặn và làm rõ các đường nét.

            Nuôi dưỡng da môi bằng hydrat hoá chữa lành tự nhiên, mọi vấn đề như khô nẻ sẽ được giải quyết triệt để.

            Thành phần nổi bật:

            - Miracle Broth™ - công thức với tảo biển giàu dinh dưỡng và các thành phần nguyên chất khác ngâm da trong khả năng chữa bệnh huyền thoại của biển, giúp hỗ trợ quá trình sửa chữa tự nhiên và độ ẩm cho da.

            - Lime Tea Concentrate: hỗn hợp chống oxy hóa tăng áp này giúp bảo vệ làn da mỏng manh chống lại tác hại của môi trường.

            - Phức hợp tái tạo làm đầy: công thức với các thành phần biển và khoáng chất giàu dinh dưỡng, phức hợp có nguồn gốc biển mạnh này hỗ trợ Collagen tự nhiên và mang lại vẻ trẻ trung đầy đặn.

            *Miracle Broth là "thần dược" độc quyền có trong tất cả sản phẩm của La Mer, được pha chế từ tảo biển thu hoạch bằng tay cùng với các chất dinh dưỡng và khoáng chất khác thông qua quá trình lên men tự nhiên. Hỗ trợ năm khía cạnh của sự chữa lành tự nhiên: độ ẩm, tái tạo, làm dịu, làm mịn và rạng rỡ giúp đưa làn da trở lại trạng thái khỏe mạnh nhất.' ,'trangthai'=>1,'created_at'=> '2021-08-16 20:56:18','updated_at'=> NULL],

            ['id'=>4,'iddanhmuc'=>4,'idthuonghieu'=>9,'name'=>'LA MER The Lip Balm - Sáp dưỡng môi cao cấp', 'slug'=> Str::slug('LA MER The Lip Balm - Sáp dưỡng môi cao cấp', '-'),'img'=>'["profile-photo-1635519265.png","profile-photo-1635519265.png","profile-photo-1635519312.png"]','soluotmua' => '150', 'tonkho' => '300', 'dongia' => '590000','mota'=> 'Sáp dưỡng môi luôn nằm trong danh sách những sản phẩm dưỡng môi tốt nhất thời đại của Thế Giới.','noidung'=>'Làm mới làn da môi ngay từ lần sử dụng đầu tiên, sáp dưỡng này đưa vào môi một độ ẩm sâu, khiến chúng mềm mại, mịn màng và đầy đặn.

            - Ngay lập tức làm mềm độ nhám, nuôi dưỡng và giúp làm dịu sự khô da môi nghiêm trọng.

            - Phức hợp Lipid được cấp bằng sáng chế giúp phục hồi và tăng cường hàng rào độ ẩm tự nhiên và ngăn ngừa tác hại từ môi trường.

            - Nồng độ cao Miracle BrothTM  sẽ tái tạo và làm mới làn da một cách tinh tế nhất.

            - Hương bạc hà thơm mát.

            *Miracle Broth là "thần dược" độc quyền có trong tất cả sản phẩm của La Mer, được pha chế từ tảo biển thu hoạch bằng tay cùng với các chất dinh dưỡng và khoáng chất khác thông qua quá trình lên men tự nhiên. Hỗ trợ năm khía cạnh của sự chữa lành tự nhiên: độ ẩm, tái tạo, làm dịu, làm mịn và rạng rỡ giúp đưa làn da trở lại trạng thái khỏe mạnh nhất.' ,'trangthai'=>1,'created_at'=> '2021-08-16 20:56:18','updated_at'=> NULL],

            ['id'=>5,'iddanhmuc'=>5,'idthuonghieu'=>9,'name'=>'LA MER The Eye Concentrate - Kem dưỡng mắt tập trung', 'slug'=> Str::slug('LA MER The Eye Concentrate - Kem dưỡng mắt tập trung', '-'),'img'=>'["profile-photo-1635519265.png","profile-photo-1635519265.png","profile-photo-1635519312.png"]','soluotmua' => '150', 'tonkho' => '300', 'dongia' => '590000','mota'=> 'Kem mắt tập trung giúp cải thiện rõ rệt quầng thâm và làm mờ các nếp nhăn đồng thời ngăn ngừa thiệt hại trong tương lai với công thức mới dưỡng ẩm sâu.','noidung'=>'Kem mắt cô đặc mang lại một đôi mắt trẻ trung đầy sức sống và tươi sáng, nơi dễ bị tác động nhất bởi tác hại của thời gian và môi trường.

            - Với gấp ba lần lượng "thuốc tiên" Miracle Broth™ so với phiên bản cũ, truyền vào da nguồn năng lượng thiết yếu và hydrat hóa chữa lành, hỗ trợ đổi mới cho vùng mắt mịn màng và sáng hơn.

            - Chiết xuất trà chanh được biết đến là một chất chống oxy hoá mạnh mẽ độc quyền của La Mer giúp ngăn ngừa sự lão hoá, nếp nhăn, quầng thâm và đồi mồi trong tương lai trước khi nó bắt đầu.

            - Chiết xuất lên men từ tảo bẹ có nguồn gốc từ vùng nước tinh khiết của đảo Jeju Hàn Quốc khôi phục lại sự cân bằng cho một cái nhìn mạnh mẽ và tái sinh.

            - Hematite - một loại khoáng chất giàu sắt, tích điện từ giúp cải thiện rõ rệt quầng thâm, cải thiện vùng da không đều màu.

            - Radiant Ferment làm sáng, làm rõ và hỗ trợ Colagen và Elastin tự nhiên để tăng cường độ săn chắc.

            - Dụng cụ lăn mắt đi kèm được thiết kế đặc biệt, có đầu bạc ngay lập tức cải thiện vi tuần hoàn tự nhiên để mang lại vẻ ngoài tràn đầy năng lượng.

             Giải pháp cho:

            Quầng thâm
            Da khô
            Nếp nhăn và chân chim
            *Miracle Broth là "thần dược" độc quyền có trong tất cả sản phẩm của La Mer, được pha chế từ tảo biển thu hoạch bằng tay cùng với các chất dinh dưỡng và khoáng chất khác thông qua quá trình lên men tự nhiên. Hỗ trợ năm khía cạnh của sự chữa lành tự nhiên: độ ẩm, tái tạo, làm dịu, làm mịn và rạng rỡ giúp đưa làn da trở lại trạng thái khỏe mạnh nhất.

            ' ,'trangthai'=>1,'created_at'=> '2021-08-16 20:56:18','updated_at'=> NULL],
            ['id'=>6,'iddanhmuc'=>6,'idthuonghieu'=>9,'name'=>'INVISIBLUR PERFECTING SHIELD BROAD SPECTRUM SPF 30', 'slug'=> Str::slug('INVISIBLUR PERFECTING SHIELD BROAD SPECTRUM SPF 30', '-'),'img'=>'["profile-photo-1635519265.png","profile-photo-1635519265.png","profile-photo-1635519312.png"]','soluotmua' => '150', 'tonkho' => '300', 'dongia' => '590000','mota'=>'Với khả năng chống nắng quang phổ rộng cùng công nghệ MuraSol độc quyền, sản phẩm giúp bảo vệ làn da hoàn hảo trước tác hại của tia UV.','noidung'=>'Bảo vệ toàn diện. Nuôi dưỡng đủ đầy. Mặt da nhung mịn. Perfecting Shield Broad Spectrum SPF 30 PA +++ ra đời như thể để xóa nhòa ranh giới giữa sản phẩm chăm sóc da và mỹ phẩm trang điểm, giúp làn da nhận được những gì tuyệt hảo nhất của thiên nhiên và công nghệ. Với chiết xuất những loại peptide từ nấm, giúp các dấu hiệu lão hóa dường như tan biến, để lại nét da trẻ trung và căng đầy.

            Khi dùng độc lập, công thức Soft Focus Complex sẽ làm mờ lỗ chân lông, nếp nhăn và các khuyết điểm khác trên da. Khi sử dụng như kem lót, công thức này sẽ giúp kem nền đạt được hiệu ứng hoàn hảo nhất, và giữ cho lớp trang điểm bền bỉ suốt 12 tiếng*. Invisiblur Perfecting Shield Broad Spectrum SPF 30 PA +++ còn không hề chứa Parabens, Sulfates, Phthalates, Gluten và các thành phần có chiết xuất từ động vật.

            Invisiblur Perfecting Shield Broad Spectrum SPF 30 PA +++ còn là kem chống nắng quang phổ rộng cùng co giúp bạn chống được tất cả ảnh hưởng từ tia UVA và UVB. Hơn cả thế, với dạng thức trong suốt tựa như vô hình trên da, giúp bạn tránh được các vệt trắng mà kem chống nắng thông thường hay mắc phải.

            Thành phần nổi bật:' ,'trangthai'=>1,'created_at'=> '2021-08-16 20:56:18','updated_at'=> NULL]
        ]);
        // DB::table('sanphamchitiet')->insert([
        //     ['id'=>1,'idsanpham' => 1, 'soluotmua' => '150', 'tonkho' => '300', 'dongia' => '590000'],
        //     ['id'=>2,'idsanpham' => 1, 'soluotmua' => '99', 'tonkho' => '300', 'dongia' => '690000'],
        //     ['id'=>3,'idsanpham' => 1, 'soluotmua' => '80', 'tonkho' => '300', 'dongia' => '890000'],
        //     ['id'=>4,'idsanpham' => 2, 'soluotmua' => '150', 'tonkho' => '300', 'dongia' => '1500000'],
        //     ['id'=>5,'idsanpham' => 2, 'soluotmua' => '99', 'tonkho' => '300', 'dongia' => '1600000'],
        //     ['id'=>6,'idsanpham' => 2, 'soluotmua' => '80', 'tonkho' => '300', 'dongia' => '1800000'],
        //     ['id'=>7,'idsanpham' => 3, 'soluotmua' => '150', 'tonkho' => '300', 'dongia' => '3600000'],
        //     ['id'=>8,'idsanpham' => 3, 'soluotmua' => '99', 'tonkho' => '300', 'dongia' => '3800000'],
        //     ['id'=>9,'idsanpham' => 3, 'soluotmua' => '80', 'tonkho' => '300', 'dongia' => '4000000'],
        //     ['id'=>10,'idsanpham' => 4,'soluotmua' => '150', 'tonkho' => '300', 'dongia' => '1650000'],
        //     ['id'=>11,'idsanpham' => 4,'soluotmua' => '99', 'tonkho' => '300', 'dongia' => '1850000'],
        //     ['id'=>12,'idsanpham' => 4,'soluotmua' => '80', 'tonkho' => '300', 'dongia' => '2000000'],
        //     ['id'=>13,'idsanpham' => 5,'soluotmua' => '150', 'tonkho' => '300', 'dongia' => '4700000'],
        //     ['id'=>14,'idsanpham' => 5,'soluotmua' => '99', 'tonkho' => '300', 'dongia' => '4800000'],
        //     ['id'=>15,'idsanpham' => 5,'soluotmua' => '80', 'tonkho' => '300', 'dongia' => '5000000'],
        // ]);
    }
}

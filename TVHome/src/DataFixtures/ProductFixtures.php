<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProductFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $productData = [
            ['id' => 'TV001', 
            'name' => 'Smart Tivi NanoCell LG 4K 75 inch 75NANO76SQA', 
            'image' => 'assets/images/product/TV001.jpg',
            'description' => 'Smart Tivi NanoCell LG 4K 75 inch 75NANO76SQA thể hiện khung hình 4K rực rỡ với công nghệ NanoCell, cuốn hút người dùng từ âm thanh tinh chỉnh theo nội dung, thỏa mãn nhu cầu giải trí cùng kho ứng dụng phong phú webOS 22, mang đến lựa chọn tuyệt vời cho gia đình bạn.', 
            'price' => '20990000'],
    
            ['id' => 'TV002', 
            'name' => 'Google Tivi Sony 4K 65 inch KD-65X80K', 
            'image' => 'assets/images/product/TV002.jpg',
            'description' => 'Google Tivi Sony 4K 65 inch KD-65X80K mang thiết kế thanh lịch, tối giản, đi cùng là bộ xử lý X1 4K HDR sắc nét, công nghệ âm thanh vòm Dolby Atmos sống động, hệ điều hành Google TV gọn gàng, dễ nhìn và tiện ích điều khiển bằng giọng nói chắc chắn sẽ là là lựa chọn không thể tuyệt vời hơn cho gia đình bạn.', 
            'price' => '18890000'],

            ['id' => 'TL001', 
            'name' => 'Tủ lạnh Samsung Inverter 655 lít Side By Side RS62R5001B4/SV', 
            'image' => 'assets/images/product/TL001.jpg',
            'description' => 'Tủ lạnh Samsung Inverter 655 lít RS62R5001B4/SV là một chiếc tủ lạnh mang gam màu đen đẳng cấp, thời thượng. Đi cùng kiểu dáng tủ lạnh side by Side 2 cửa mở rộng sang trọng, tủ lạnh không chỉ là điểm nhấn cho không gian nội thất mà nó còn giúp bạn thuận tiện trong việc quan sát, tìm kiếm và sắp xếp thực phẩm.', 
            'price' => '16290000'],

            ['id' => 'TL002', 
            'name' => 'Tủ lạnh LG Inverter 519 lít Side By Side GR-B256BL', 
            'image' => 'assets/images/product/TL002.jpg',
            'description' => 'Tủ lạnh LG Inverter 519 lít GR-B256BL thuộc dòng tủ lạnh Side by side, có sự kết hợp giữa Smart Inverter và Linear Inverter giúp vận hành êm ái, tiết kiệm điện năng. Bên cạnh đó, công nghệ làm lạnh đa chiều mang hơi lạnh lan tỏa đều và bộ lọc khử mùi than hoạt tính loại bỏ mùi hôi hiệu quả.', 
            'price' => '12990000'],

            ['id' => 'MG001', 
            'name' => 'Máy giặt Toshiba Inverter 8.5 Kg TW-BH95S2V WK ', 
            'image' => 'assets/images/product/MG001.jpg',
            'description' => 'Máy giặt Toshiba Inverter 8.5 Kg TW-BH95S2V WK sở hữu sắc trắng thanh lịch, trung tính, kết hợp với kiểu dáng cửa trước hiện đại, hứa hẹn sẽ mang đến cho không gian nội thất của gia đình vẻ đẹp tinh tế, sang trọng. Bên cạnh đó, nếu gia đình bạn có từ 3 đến 5 thành viên và có nhu cầu tìm mua máy giặt thì chiếc máy giặt Toshiba 8.5 kg này chính là một sự lựa chọn lý tưởng.', 
            'price' => '5990000'],

            ['id' => 'MG002', 
            'name' => 'Máy giặt Electrolux Inverter 9 kg EWF9025DQWB ', 
            'image' => 'assets/images/product/MG002.jpg',
            'description' => 'máy giặt Electrolux Inverter 9 kg EWF9025DQWB có kiểu dáng hiện đại, dễ dàng phối hợp với nhiều nội thất khác bên trong khu vực giặt giũ của gia đình. Sản phẩm có khả năng tiết kiệm điện, phù hợp với gia đình từ 3 - 5 thành viên. Ngoài ra, với công nghệ giặt nước nóng, hơi nước thì mẫu máy giặt này cũng phù hợp cho gia đình có trẻ nhỏ hay những người có làn da nhạy cảm.', 
            'price' => '7990000'],

            ['id' => 'MLN001', 
            'name' => 'Máy lọc nước RO Daikiosan DXW-42010H 10 lõi', 
            'image' => 'assets/images/product/MLN001.jpg',
            'description' => 'Máy lọc nước Daikiosan kiểu dáng sang trọng, bền bỉ nhờ vỏ tủ bằng thép sơn tĩnh điện và kính cường lực. Hệ thống bơm 1 chiều kết hợp hệ thống van điện từ, phù hợp cho nhà có nguồn nước áp lực đủ mạnh như bể, bồn chứa nước cao từ 3 mét trở lên.', 
            'price' => '2490000'],

            ['id' => 'MLN002', 
            'name' => 'Máy lọc nước R.O nóng nguội lạnh Hydrogen Kangaroo KG10A4VTU 10 lõi ', 
            'image' => 'assets/images/product/MLN002.jpg',
            'description' => 'Máy lọc nước RO Kangaroo KG10A4 VTU với công nghệ RO cho nguồn nước sạch hơn. Tích hợp với 2 vòi nóng lạnh với công nghệ làm lạnh bằng máy nén sử dụng gas R600A, là sản phẩm đem lại nhiều tiện nghi và ích lợi cho cuộc sống cũng như sức khỏe của cả gia đình.', 
            'price' => '7590000 '],

            ['id' => 'ML001', 
            'name' => 'Máy lạnh Daikin Inverter 1 HP ATKF25XVMV', 
            'image' => 'assets/images/product/ML001.jpg',
            'description' => 'Máy lạnh Daikin Inverter 1 HP ATKF25XVMV là dòng máy lạnh sở hữu nhiều tính năng hiện đại với công nghệ lọc khí Streamer và Phin lọc Enzyme Blue tích hợp PM2.5 giúp tinh lọc không khí và loại bỏ các vi rút, vi khuẩn, mùi hôi và nấm mốc hiệu quả. Trang bị công nghệ Inverter giúp tiết kiệm điện năng hiệu quả. Dàn nóng được cải tiến nên máy vận hành êm ái đảm bảo giấc ngủ ngon mỗi tối.', 
            'price' => '11340000'],

            ['id' => 'ML002', 
            'name' => 'Máy lạnh Panasonic Inverter 1 HP CU/CS-XU9ZKH-8', 
            'image' => 'assets/images/product/ML002.jpg',
            'description' => 'Máy lạnh Panasonic Inverter 1 HP CU/CS-XU9ZKH-8 thổi hơi lạnh vào căn phòng dưới 15m² của bạn nhanh chóng với công nghệ làm lạnh nhanh iAuto-X, công suất 1 HP, sử dụng tiết kiệm điện với công nghệ ECO tích hợp A.I và Inverter, giữ không gian phòng sạch sẽ, diệt khuẩn, khử mùi tối ưu với công nghệ Nanoe™ X, Nanoe-G, điều khiển bằng điện thoại, có wifi tiện lợi.', 
            'price' => '13990000'],

            ['id' => 'NC001', 
            'name' => 'Nồi cơm điện tử Kangaroo 1.8 lít KG595', 
            'image' => 'assets/images/product/NC001.jpg',
            'description' => 'Nồi cơm điện tử 1.8 lít Kangaroo KG595 thiết kế kiểu Hàn Quốc sang trọng, chất lượng tốt, lựa chọn hoàn hảo cho mọi gia đình.', 
            'price' => '1350000'],

            ['id' => 'NC002', 
            'name' => 'Nồi cơm nắp gài Sunhouse 1 lít SHD8208C', 
            'image' => 'assets/images/product/NC002.jpg',
            'description' => 'Nồi cơm nắp gài Sunhouse 1 lít SHD8208C kiểu dáng nhỏ gọn, thanh lịch, màu sắc tươi sáng. Dung tích nồi cơm điện 1 lít đáp ứng đủ nhu cầu nấu cơm cho gia đình từ 2 - 4 người.', 
            'price' => '550000'],

            ['id' => 'BD001', 
            'name' => 'Bếp từ đôi lắp âm Junger MK-22', 
            'image' => 'assets/images/product/BD001.jpg',
            'description' => 'Bếp từ đôi Junger màu đen với thiết kế có thể lắp đặt âm hoặc để nổi, tiết kiệm diện tích căn bếp, tiện lợi cho việc chế biến món ăn. Có 4 chân đế cao su cách điện cách nhiệt, tránh trường hợp trơn trượt, cố định vị trí bếp trong quá trình nấu nướng khi bếp được đặt nổi.', 
            'price' => '9590000'],

            ['id' => 'BD002', 
            'name' => 'Bếp từ đôi lắp âm Sunhouse SHB9111MT', 
            'image' => 'assets/images/product/BD002.jpg',
            'description' => 'Bếp từ đôi Sunhouse thiết kế lắp âm hiện đại, có hai vùng nấu rộng rãi. Cho bạn chế biến được nhiều món ăn cùng lúc. Bạn có thể vừa nấu canh, vừa chiên xào thực phẩm một cách thoải mái và tiện lợi.', 
            'price' => '2490000'],

            ['id' => 'DT001', 
            'name' => 'Điện thoại Samsung Galaxy S23+ 5G 512GB',
            'image' => 'assets/images/product/DT001.jpg', 
            'description' => 'Samsung Galaxy S23 Plus 5G 512GB đã được trình làng giới công nghệ vào rạng sáng 02/01, máy mang một thiết kế sang trọng đẳng cấp, hiệu năng được cải thiện đáng kể cùng viên pin cho thời gian sử dụng dài lâu, giúp trải nghiệm của bạn trở nên dễ dàng và tiện lợi hơn bao giờ hết.', 
            'price' => '29990000'],

            ['id' => 'DT002', 
            'name' => 'Điện thoại iPhone 15 Pro Max 256GB ',
            'image' => 'assets/images/product/DT002.jpg', 
            'description' => 'iPhone 15 Pro Max là một chiếc điện thoại thông minh cao cấp với nhiều ưu điểm nổi bật, bao gồm thiết kế đẹp mắt, hiệu năng mạnh mẽ, camera tuyệt vời và mức giá cạnh tranh. Nếu bạn đang tìm kiếm một chiếc điện thoại có thể đáp ứng tốt mọi nhu cầu sử dụng, thì iPhone 15 Pro Max là một lựa chọn đáng cân nhắc.', 
            'price' => '33490000'],

        ];

        foreach ($productData as $data) {
            $product = new Product();
            $product
                ->setId($data['id'])
                ->setName($data['name'])
                ->setImage($data['image'])
                ->setDescription($data['description'])
                ->setPrice($data['price']);

            $manager->persist($product);
        }

        $manager->flush();
    }
}

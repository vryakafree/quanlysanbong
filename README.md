# Đồ án chuyên ngành - Xây dựng website & app quản lý sân bóng

## Thành viên

- Trần Duy Anh - <duyanh221299@gmail.com>
- Nguyễn Gia Hải
- Nguyễn Thanh Phong

## Giảng viên hướng dẫn

- Tên giảng viên: Lê Thị Ngọc Thơ
- Mail giảng viên: ltn.tho@hutech.edu.vn

## Thời gian thực hiện

- Bắt đầu - 21/03/2022
- Kết thúc - 12/06/2022 

## Hướng dẫn cài đặt môi trường dự án

#### Lưu ý: Bắt buộc phải cài môi trường ảo để thống nhất môi trường lập trình giữa các thành viên.

#### Tuyệt đối không dùng XAMPP, Laragon,... vì những tool này không hỗ trợ đủ.

### 1. Cài đặt [Jetbrains Toolbox](https://www.jetbrains.com/toolbox-app/) (Hỗ trợ cài đặt IDE PHPStorm nhanh chóng)

### 2. Cài đặt [Docker](https://www.docker.com/)

- Sau khi khởi động lại máy sẽ hiện lên bảng "WSL 2 installation is incomplete" báo WSL 2 chưa được cài đặt
- Nhấp vào đường link "https://aka.ms/wsl2kernal" và làm theo bước 4 và 5 trên trang hướng dẫn
- Nhấp chọn Restart để khởi động lại Docker sau khi đã hoàn thành bước trên

### 3. Cài đặt [Windows Terminal](https://www.microsoft.com/en-us/p/windows-terminal/9n0dx20hk701?activetab=pivot:overviewtab)

### 4. Mở Windows Terminal đã cài đặt ở bước 2 và chạy lệnh sau:

```bash
wsl --set-default-version 2
```

### 5. Cài đặt [Ubuntu 20.04](https://www.microsoft.com/store/productId/9MTTCL66CPXJ)

- Ở lần mở đầu tiên Ubuntu sẽ yêu cầu điền username và password, password rất quan trọng nên hãy nhớ (khi nhập password ubuntu sẽ ẩn chữ chứ không phải do chưa nhập đâu nhé!)
- Sau khi đã thực hiện đầy đủ thì mở Windows Terminal và chạy lệnh sau:

    ```bash
    wsl -l -v
    ```
    
    Nếu kết quả trả về như bên dưới là thành công:
    
    ```bash
      NAME                   STATE           VERSION
    * docker-desktop         Running         2
      docker-desktop-data    Running         2
      Ubuntu-20.04           Stopped         2
    ```
    
    Nếu ở mục Ubuntu-20.04 hiển thị VERSION là 1 thì chạy lệnh sau để chuyển phiên bản sang WSL 2:
    
    ```bash
    wsl --set-version Ubuntu-20.04 2
    ```

### 6. Mở bảng Settings của Docker và tích chọn như bên dưới và nhấn `Apply & Restart`

![image](https://user-images.githubusercontent.com/58473133/108045336-ee835100-7075-11eb-89cd-d3b19688f74a.png)
![image](https://user-images.githubusercontent.com/58473133/108045446-0c50b600-7076-11eb-8bba-9b94dc1adc96.png)

### 7. Tắt toàn bộ những ứng dụng liên quan như Windows Terminal,... và khởi động lại Windows Terminal để cập nhật cấu hình mới

### 8. Sau khi đã khởi động lại Windows Terminal, chuyển sang tab Ubuntu 20.04 như hình

![image](https://user-images.githubusercontent.com/58473133/108045756-68b3d580-7076-11eb-9b73-e9f2c98ca078.png)

### 9. Chạy các lệnh sau để kiểm tra việc cài đặt đã thành công hay chưa

```bash
docker -v
docker-compose -v
```
Nếu kết quả như bên dưới là thành công
```bash
# ...
Docker version 20.10.2, build 2291f61
docker-compose version 1.27.4, build 40524192
# ...
```

### 10. Clone đồ án từ Github

```bash
mkdir ~/PhpStormProjects
cd ~/PhpStormProjects
# Lưu ý: Git được cài đặt sẵn trong Ubuntu 20.04
git clone https://github.com/vryakafree/quanlysanbong.git
```

- Trong quá trình clone sẽ hỏi tài khoản và mật khẩu thì truy cập vào: https://github.com/settings/tokens

![image](https://user-images.githubusercontent.com/58522357/164884295-664e3271-6861-49df-90d2-cdf3f1f6b1f6.png)

- Sau đó generate new token, bật full quyền cho token và chuyển thời gian hết hạn thành no expiration

![image](https://user-images.githubusercontent.com/58522357/164884323-f3e25bfa-f698-4197-b4fe-6d4b0046099b.png)

- Nhớ lưu lại token đề phòng, sau khi có token, dán nó vào phần tài khoản & mật khẩu (khi nhập password ubuntu sẽ ẩn chữ chứ không phải do chưa nhập đâu nhé!)

![image](https://user-images.githubusercontent.com/58522357/164884442-d513b6e2-3142-406f-afd0-0bebfaffc2ea.png)


### 11. Cài đặt thư viện trong đồ án

```bash
cd quanlysanbong

# Sẽ mất vài phút tuỳ thuộc vào tốc độ mạng
# docker run --rm -v $(pwd):/opt -w /opt laravelsail/php80-composer:latest composer install

docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/opt \
    -w /opt \
    laravelsail/php80-composer:latest \
    composer install --ignore-platform-reqs

sudo chown -R $USER: .
```

Sau khi cài xong chạy tiếp lệnh dưới để kiểm tra

```bash
./vendor/bin/sail -v
```

Nếu kết quả trả về như bên dưới là thành công

```bash
docker-compose version 1.27.4, build 40524192
```

### 12. Cài đặt môi trường lập trình

Ở lần đầu tiên thì nó sẽ tự động setup môi trường lập trình cho mình, sẽ mất vài phút tuỳ thuộc vào tốc độ mạng (lúc này không sử dụng lệnh down bên dưới nhé, chỉ khi nào không code nữa mới phải dùng để tắt máy ảo thôi!!!)

```bash
cp .env.example .env

# khởi động máy ảo docker (mỗi khi muốn localhost hoạt động thì chạy lại lệnh này:)
./vendor/bin/sail up -d

-----------------------------------------------------------------
# (khi cần tắt, không sử dụng localhost nữa thì sử dụng lệnh này:) 
./vendor/bin/sail down -v
```

Nếu quá trình diễn ra hoàn tất và trên Windows Terminal hiển thị như bên dưới là thành công
Nếu Docker bị Windows Firewall chặn thì cứ `Allow access`

```bash
# ...
Creating quanlysanbong_redis_1 ... done
Creating quanlysanbong_mysql_1 ... done
Creating quanlysanbong_laravel.test_1 ... done
```

### 13. Cấu hình dự án (Nếu bước này hoàn thành thì có thể truy cập localhost để xem thành quả, mỗi khi thay đổi gì liên quan đến file css thì đều chạy lại 2 phần front-end của bước này nhé!)

```bash
# Khởi tạo các tệp tin hỗ trợ PHPStorm
./vendor/bin/sail artisan ide-helper:models -N

# Cài đặt thư viện hỗ trợ front-end
./vendor/bin/sail yarn install
# Build các file cho front-end
./vendor/bin/sail yarn dev

# Migration database và seed data
./vendor/bin/sail artisan migrate:fresh --seed

# Nếu báo lỗi `password authentication failed for user "root"` thì hãy chạy lệnh sau, không thì hãy bỏ qua
./vendor/bin/sail down
docker rm -f $(docker ps -a -q)
docker volume rm $(docker volume ls -q)
# Sau khi chạy xong 3 lệnh trên thì quay lại chạy lại bước `Migration database và seed data`
```

### 14. Mở PHPStorm và open project với đường dẫn từ bước 10

![image](https://user-images.githubusercontent.com/58522357/164885035-cdd90fb4-41e6-4383-9540-90ae7eaf1b4c.png)


Để PHPStorm hỗ trợ tốt hơn hãy cài thêm một số plugin sau:
- .env files support 
- Laravel (Hỗ trợ Laravel)
- Laravel Idea (Hỗ trợ Laravel)
- Tailwind Formatter (Hỗ trợ TailwindCSS)
- Material Theme UI (Nếu muốn giao diện đẹp)

### 15. Kết nối PHPStorm với cơ sở dữ liệu, PHPStorm đã hỗ trợ kết nối csdl đầy đủ nên không cần cài thêm bất kỳ tool nào như phpmyadmin, sql management,...

![image](https://user-images.githubusercontent.com/58522357/164885400-d9cd4679-57f6-4c06-b4b8-719e1d9f1861.png)

kiểm tra thông tin trong file .evn

![image](https://user-images.githubusercontent.com/58522357/164887208-a4b76007-8202-41ff-bc56-efd092a5c5f2.png)


Ở bước này PHPStorm sẽ yêu cầu tải driver thì cứ bấm tải để PHPStorm tự động tải và nhập đầy đủ thông tin (user, password, database, port) như bên dưới,
sau khi nhập xong nhấn `Test connection` để kiểm tra để xem kết nối được csdl hay chưa, nếu thành công rồi thì bấm `OK`

![image](https://user-images.githubusercontent.com/58522357/164885899-482d7d85-c15c-4a29-9e70-8828544532a2.png)
![image](https://user-images.githubusercontent.com/58522357/164885931-15c1a367-3391-48a8-aed1-54ab223493a1.png)

Sau khi kết nối thành công, PHPStorm sẽ hiện bảng bên dưới để có thể thao tác với csdl

![image](https://user-images.githubusercontent.com/58522357/164887304-6431338d-a380-4314-bce8-2403bd534dbe.png)
![image](https://user-images.githubusercontent.com/58522357/164887331-98bf9691-92b0-475e-8e90-4f8ced623ebf.png)

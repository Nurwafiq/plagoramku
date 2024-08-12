#!/bin/bash

# Daftar tabel dan file .ibd-nya
tables=("failed_jobs" "migrations" "password_reset_tokens" "penjualans" "personal_access_tokens" "produks" "users")
files=("failed_jobs.ibd" "migrations.ibd" "password_reset_tokens.ibd" "penjualans.ibd" "personal_access_tokens.ibd" "produks.ibd" "users.ibd")

# Path direktori MySQL
mysql_data_path="/opt/homebrew/var/mysql/db_apriori"

# Menyalin file .ibd
# for i in "${!tables[@]}"; do
#     echo "Menyalin file ${files[$i]} ke $mysql_data_path"
#     cp "${files[$i]}" "$mysql_data_path/${tables[$i]}.ibd"
# done

# Menjalankan perintah SQL untuk DISCARD dan IMPORT TABLESPACE
mysql -u root -pTenin@123 -e "
USE db_apriori;
$(for table in "${tables[@]}"; do
   #  echo "ALTER TABLE $table DISCARD TABLESPACE;"
    echo "ALTER TABLE $table IMPORT TABLESPACE;"
done)"

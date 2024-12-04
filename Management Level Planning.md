### Access Rights for Each Role

1. **Admin Level**
   - **Full Access** to all functionalities and tables.
   - **Can Manage:**
     - `profile_klinik`: Add, update, delete clinic profiles.
     - `users`: Add, update, delete users and assign roles.
     - `karyawan`: Add, update, delete employee records.
     - `jadwal_praktek`: Manage employee schedules.
     - `pasien`: View patient records.
     - `kunjungan`: View patient visits.
     - `resep_obat`: Manage medication details.
     - `detail_resep`: View prescription details.
     - `pembayaran`: View and manage payment records.

2. **Karyawan Level**
   - **Access Rights Vary by Job Role:**
     - **Doctors:**
       - `kunjungan`: Add, update patient visits.
       - `detail_resep`: Add, update prescription details.
       - `jadwal_praktek`: View their own schedule.
     - **Nurses:**
       - `kunjungan`: View patient visits.
       - `detail_resep`: View prescription details.
       - `jadwal_praktek`: View their own schedule.
     - **Receptionists:**
       - `pasien`: Add, update patient records.
       - `kunjungan`: Schedule patient visits.
     - **Cashiers:**
       - `pembayaran`: Add, update payment records.
     - **Admins (within Karyawan):**
       - Similar access as top-level Admin, but may have restricted deletion rights.

3. **User Level (Patients)**
   - **Access Rights:**
     - `pasien`: View their own patient records.
     - `kunjungan`: View their own visit history.
     - `resep_obat`: View their own medication details.
     - `detail_resep`: View their own prescription details.
     - `pembayaran`: View their own payment history.

### Detailed Access Matrix

| **Role**        | **profile_klinik** | **users** | **karyawan** | **jadwal_praktek** | **pasien** | **kunjungan** | **resep_obat** | **detail_resep** | **pembayaran** |
|-----------------|--------------------|-----------|--------------|--------------------|------------|---------------|----------------|------------------|----------------|
| **Admin**       | Full Access        | Full Access| Full Access  | Full Access        | View       | View          | Manage         | View             | Manage         |
| **Doctors**     | No Access          | No Access  | No Access    | View (self)        | No Access  | Manage (self) | View           | Manage (self)    | No Access      |
| **Nurses**      | No Access          | No Access  | No Access    | View (self)        | No Access  | View (self)   | View           | View (self)      | No Access      |
| **Receptionists**| No Access         | No Access  | No Access    | No Access          | Manage     | Schedule      | No Access      | No Access        | No Access      |
| **Cashiers**    | No Access          | No Access  | No Access    | No Access          | No Access  | No Access     | No Access      | No Access        | Manage         |
| **Users**       | No Access          | No Access  | No Access    | No Access          | View (self)| View (self)   | View (self)    | View (self)      | View (self)    |

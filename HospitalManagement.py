import bcrypt
import mysql.connector
import time

def hash_password(password):
    salt = bcrypt.gensalt()
    hashed_password = bcrypt.hashpw(password.encode('utf-8'), salt)
    return hashed_password.decode('utf-8')

def verify_password(stored_hash, password):
    return bcrypt.checkpw(password.encode('utf-8'), stored_hash.encode('utf-8'))

class DatabaseConnection:
    def __init__(self):
        try:
            self.conn = mysql.connector.connect(
                host="localhost",
                user="root",
                password="",
                database="hospital_management"
            )
            self.cursor = self.conn.cursor(dictionary=True)
        except mysql.connector.Error as err:
            print(f"\n❌ Error: Could not connect to the database. {err}")
            exit()

    def fetch_all(self, query, params=()):
        self.cursor.execute(query, params)
        return self.cursor.fetchall()

    def fetch_one(self, query, params=()):
        self.cursor.execute(query, params)
        return self.cursor.fetchone()

    def execute_query(self, query, params=()):
        self.cursor.execute(query, params)
        self.conn.commit()

    def close_connection(self):
        self.cursor.close()
        self.conn.close()

class HospitalManagementSystem:
    def __init__(self):
        self.database = DatabaseConnection()

    def login(self):
        print("\n=== Login ===")
        for _ in range(3):
            username = input("Enter username: ")
            password = input("Enter password: ")

            query = "SELECT * FROM admin WHERE username = %s"
            admin = self.database.fetch_one(query, (username,))

            if admin:
                stored_hash = admin['password']
                if verify_password(stored_hash, password):
                    print("\n✅ Login successful!")
                    return True
                else:
                    print("\n❌ Invalid password. Try again.")
            else:
                print("\n❌ Invalid username. Try again.")

        print("\n❌ Too many failed attempts. Exiting.")
        return False

    def add_patient(self):
        print("\n=== Add Patient ===")
        patient_id = input("Enter patient ID: ")
        name = input("Enter patient name: ")
        age = int(input("Enter patient age: "))
        gender = input("Enter patient gender: ")
        diagnosis = input("Enter patient diagnosis: ")

        query = "INSERT INTO patients (patient_id, name, age, gender, diagnosis) VALUES (%s, %s, %s, %s, %s)"
        self.database.execute_query(query, (patient_id, name, age, gender, diagnosis))
        print("\n✅ Patient added successfully!")

    def delete_patient(self):
        print("\n=== Delete Patient ===")
        patient_id = input("Enter patient ID to delete: ")

        query = "DELETE FROM patients WHERE patient_id = %s"
        self.database.execute_query(query, (patient_id,))
        print("\n✅ Patient deleted successfully!")

    def add_staff(self):
        print("\n=== Add Staff ===")
        staff_id = input("Enter staff ID: ")
        name = input("Enter staff name: ")
        role = input("Enter staff role: ")
        shift = input("Enter staff shift: ")

        query = "INSERT INTO staff (staff_id, name, role, shift) VALUES (%s, %s, %s, %s)"
        self.database.execute_query(query, (staff_id, name, role, shift))
        print("\n✅ Staff added successfully!")

    def delete_staff(self):
        print("\n=== Delete Staff ===")
        staff_id = input("Enter staff ID to delete: ")

        query = "DELETE FROM staff WHERE staff_id = %s"
        self.database.execute_query(query, (staff_id,))
        print("\n✅ Staff deleted successfully!")

    def add_doctor(self):
        print("\n=== Add Doctor ===")
        doctor_id = input("Enter doctor ID: ")
        name = input("Enter doctor name: ")
        designation = input("Enter doctor designation: ")
        phone = input("Enter doctor phone: ")

        query = "INSERT INTO doctors (doctor_id, name, designation, phone) VALUES (%s, %s, %s, %s)"
        self.database.execute_query(query, (doctor_id, name, designation, phone))
        print("\n✅ Doctor added successfully!")

    def delete_doctor(self):
        print("\n=== Delete Doctor ===")
        doctor_id = input("Enter doctor ID to delete: ")

        query = "DELETE FROM doctors WHERE doctor_id = %s"
        self.database.execute_query(query, (doctor_id,))
        print("\n✅ Doctor deleted successfully!")

    def add_inventory(self):
        print("\n=== Add Inventory Item ===")
        item_id = input("Enter item ID: ")
        item_name = input("Enter item name: ")
        quantity = int(input("Enter item quantity: "))

        query = "INSERT INTO inventory (item_id, item_name, quantity) VALUES (%s, %s, %s)"
        self.database.execute_query(query, (item_id, item_name, quantity))
        print("\n✅ Inventory item added successfully!")

    def update_inventory(self):
        print("\n=== Update Inventory ===")
        item_id = input("Enter item ID to update: ")
        new_quantity = int(input("Enter new quantity: "))

        query = "UPDATE inventory SET quantity = %s WHERE item_id = %s"
        self.database.execute_query(query, (new_quantity, item_id))
        print("\n✅ Inventory updated successfully!")

    def show_all_information(self):
        print("\n=== All Information ===")

        print("\n--- Patients ---")
        query = "SELECT * FROM patients"
        patients = self.database.fetch_all(query)
        for patient in patients:
            print(f"ID: {patient['patient_id']}, Name: {patient['name']}, Age: {patient['age']}, Gender: {patient['gender']}, Diagnosis: {patient['diagnosis']}")

        print("\n--- Staff ---")
        query = "SELECT * FROM staff"
        staff = self.database.fetch_all(query)
        for member in staff:
            print(f"ID: {member['staff_id']}, Name: {member['name']}, Role: {member['role']}, Shift: {member['shift']}")

        print("\n--- Doctors ---")
        query = "SELECT * FROM doctors"
        doctors = self.database.fetch_all(query)
        for doctor in doctors:
            print(f"ID: {doctor['doctor_id']}, Name: {doctor['name']}, Designation: {doctor['designation']}, Phone: {doctor['phone']}")

        print("\n--- Inventory ---")
        query = "SELECT * FROM inventory"
        inventory = self.database.fetch_all(query)
        for item in inventory:
            print(f"ID: {item['item_id']}, Name: {item['item_name']}, Quantity: {item['quantity']}")

    def run(self):
        if not self.login():
            return

        while True:
            print("\n=== Main Menu ===")
            print("1. Add Patient")
            print("2. Add Staff")
            print("3. Add Doctor")
            print("4. Add Inventory")
            print("5. Delete Patient")
            print("6. Delete Staff")
            print("7. Delete Doctor")
            print("8. Update Inventory")
            print("9. Show All Information")
            print("10. Logout")

            choice = input("Enter your choice: ")

            if choice == "1":
                self.add_patient()
            elif choice == "2":
                self.add_staff()
            elif choice == "3":
                self.add_doctor()
            elif choice == "4":
                self.add_inventory()
            elif choice == "5":
                self.delete_patient()
            elif choice == "6":
                self.delete_staff()
            elif choice == "7":
                self.delete_doctor()
            elif choice == "8":
                self.update_inventory()
            elif choice == "9":
                self.show_all_information()
            elif choice == "10":
                print("\nLogging out...")
                for i in range(3, 0, -1):
                    print("In ", i)
                    time.sleep(1)
                print("\nSuccessfully logged out.\n")
                self.database.close_connection()
                break
            else:
                print("\n❌ Invalid choice. Try again.")

# Main Execution
if __name__ == "__main__":
    hms = HospitalManagementSystem()
    hms.run()

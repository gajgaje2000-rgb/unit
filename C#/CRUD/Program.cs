using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Data.SqlClient;

namespace ADO_Project_2
{
    class Program
    {
        static string connectionstring = "Server=localhost\\SQLEXPRESS;Database=db_1;Trusted_Connection=True;TrustServerCertificate=True;";

        static void Main()
        {
            while (true)
            {
                Console.WriteLine("\n1. Insert");
                Console.WriteLine("2. Update");
                Console.WriteLine("3. Delete");
                Console.WriteLine("4. Select");
                Console.WriteLine("5. Exit");
                Console.Write("Enter your choice: ");

                int choice;
                int.TryParse(Console.ReadLine(), out choice);

                switch (choice)
                {
                    case 1:
                        InsertStudent();
                        break;
                    case 2:
                        UpdateStudent();
                        break;
                    case 3:
                        DeleteStudent();
                        break;
                    case 4:
                        SelectStudents();
                        break;
                    case 5:
                        return;
                    default:
                        Console.WriteLine("Invalid choice");
                        break;
                }
            }
        }

        static void InsertStudent()
        {
            using (SqlConnection con = new SqlConnection(connectionstring))
            {
                Console.Write("Enter Id: ");
                int id = Convert.ToInt32(Console.ReadLine());

                Console.Write("Enter Name: ");
                string name = Console.ReadLine();

                Console.Write("Enter Age: ");
                int age = Convert.ToInt32(Console.ReadLine());

                string query = "INSERT INTO Table_3 VALUES(@Id,@Name,@Age)";

                SqlCommand cmd = new SqlCommand(query, con);
                cmd.Parameters.AddWithValue("@Id", id);
                cmd.Parameters.AddWithValue("@Name", name);
                cmd.Parameters.AddWithValue("@Age", age);

                con.Open();
                cmd.ExecuteNonQuery();
            }

            Console.WriteLine("Student Inserted Successfully");
        }

        static void UpdateStudent()
        {
            using (SqlConnection con = new SqlConnection(connectionstring))
            {
                Console.Write("Enter Student Id to Update: ");
                int id = Convert.ToInt32(Console.ReadLine());

                Console.Write("Enter New Name: ");
                string name = Console.ReadLine();

                Console.Write("Enter New Age: ");
                int age = Convert.ToInt32(Console.ReadLine());

                string query = "UPDATE Table_3 SET name=@Name, age=@Age WHERE id=@Id";

                SqlCommand cmd = new SqlCommand(query, con);
                cmd.Parameters.AddWithValue("@Name", name);
                cmd.Parameters.AddWithValue("@Age", age);
                cmd.Parameters.AddWithValue("@Id", id);

                con.Open();
                cmd.ExecuteNonQuery();
            }

            Console.WriteLine("Student Updated Successfully");
        }

        static void DeleteStudent()
        {
            using (SqlConnection con = new SqlConnection(connectionstring))
            {
                Console.Write("Enter Student Id to Delete: ");
                int id = Convert.ToInt32(Console.ReadLine());

                string query = "DELETE FROM Table_3 WHERE id=@Id";

                SqlCommand cmd = new SqlCommand(query, con);
                cmd.Parameters.AddWithValue("@Id", id);

                con.Open();
                cmd.ExecuteNonQuery();
            }

            Console.WriteLine("Student Deleted Successfully");
        }

        static void SelectStudents()
        {
            using (SqlConnection con = new SqlConnection(connectionstring))
            {
                string query = "SELECT * FROM Table_3";
                SqlCommand cmd = new SqlCommand(query, con);

                con.Open();
                SqlDataReader dr = cmd.ExecuteReader();

                while (dr.Read())
                {
                    Console.WriteLine(
                        "Id: " + dr["Id"] +
                        " Name: " + dr["Name"] +
                        " Age: " + dr["Age"]
                    );
                }
            }
        }
    }
}

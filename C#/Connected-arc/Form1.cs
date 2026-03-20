using System;
using System.Data;
using System.Data.SqlClient;
using System.Windows.Forms;

namespace connected_ado
{
    public partial class Form1 : Form
    {
        // Global Connection String
        string conStr = "Server=.\\SQLEXPRESS;Database=db_1;Integrated Security=True";
        

        public Form1()
        {
            InitializeComponent();
            
        }

        private void Form1_Load(object sender, EventArgs e)
        {

        }

        // INSERT
        private void button1_Click(object sender, EventArgs e)
        {
            SqlConnection con = new SqlConnection(conStr);
            con.Open();

            string query = "INSERT INTO Table_1 VALUES (@Id,@Name,@City)";

            SqlCommand cmd = new SqlCommand(query, con);

            cmd.Parameters.AddWithValue("@Id", textId.Text);
            cmd.Parameters.AddWithValue("@Name", textName.Text);
            cmd.Parameters.AddWithValue("@City", textCity.Text);

            cmd.ExecuteNonQuery();

            MessageBox.Show("Data Inserted Successfully");

            con.Close();
        }

        // UPDATE
        private void button2_Click(object sender, EventArgs e)
        {
            using (SqlConnection con = new SqlConnection(conStr))
            {
                con.Open();

                string query = "UPDATE Table_1 SET Name=@Name, City=@City WHERE Id=@Id";

                SqlCommand cmd = new SqlCommand(query, con);

                cmd.Parameters.AddWithValue("@Id", textId.Text);
                cmd.Parameters.AddWithValue("@Name", textName.Text);
                cmd.Parameters.AddWithValue("@City", textCity.Text);

                cmd.ExecuteNonQuery();

                MessageBox.Show("Record Updated Successfully");
            }
        }

        // DELETE
        private void button3_Click(object sender, EventArgs e)
        {
            using (SqlConnection con = new SqlConnection(conStr))
            {
                con.Open();

                string query = "DELETE FROM Table_1 WHERE Id=@Id";

                SqlCommand cmd = new SqlCommand(query, con);

                cmd.Parameters.AddWithValue("@Id", textId.Text);

                cmd.ExecuteNonQuery();

                MessageBox.Show("Record Deleted Successfully");
            }
        }

        // SELECT
        private void button4_Click(object sender, EventArgs e)
        {
            using (SqlConnection con = new SqlConnection(conStr))
            {
                con.Open();

                string query = "SELECT * FROM Table_1";

                SqlCommand cmd = new SqlCommand(query, con);

                SqlDataReader dr = cmd.ExecuteReader();

                DataTable dt = new DataTable();
                dt.Load(dr);

                dataGridView1.DataSource = dt;
            }
        }
    }
}
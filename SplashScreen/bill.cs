using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Data.SqlClient;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace SplashScreen
{
    public partial class bill : Form
    {
        List<NumericUpDown> num = new List<NumericUpDown>();
        List<string> medNames = new List<string>();
        readonly string connectionString = "Data Source=(LocalDB)\\MSSQLLocalDB;Initial Catalog=PMS;Integrated Security=True;Pooling=False";

        public bill()
        {
            InitializeComponent();
        }
        private void pictureBox4_Click(object sender, EventArgs e)
        {

        }

        private void button3_Click(object sender, EventArgs e)
        {
            getMedicineName();
        }

        private void getMedicineName()
        {
            SqlConnection newConnection = new SqlConnection(connectionString);
            SqlCommand newCommand = new SqlCommand("SELECT Ref_Id FROM CUSTOMER WHERE Customer_name = '"+ textBox3.Text +"'", newConnection);
            
            newConnection.Open();
            int Ref_Id = 0;
            SqlDataReader rdr = newCommand.ExecuteReader();
            if(rdr.Read())
            {
                Ref_Id = Convert.ToInt32(rdr[0].ToString());
            }
            newConnection.Close();

            using (SqlConnection cnn = new SqlConnection("Data Source=(LocalDB)\\MSSQLLocalDB;Initial Catalog=PMS;Integrated Security=True;Pooling=False"))
            {
                SqlDataAdapter da = new SqlDataAdapter("select Med_Name from REFERENCE_TABLE WHERE Ref_Id = '"+ Ref_Id +"'", cnn);
                DataSet ds = new DataSet();
                da.Fill(ds, "REFERENCE_TABLE");

                foreach (DataRow row in ds.Tables["REFERENCE_TABLE"].Rows)
                {
                    medNames.Add(row["Med_Name"].ToString());
                }
                int labelX = 23;
                int labelY = 105;
                int labelX1 = 212;
                int labelY1 = 110;
                // Creating and setting the label
                int i = 0;
                foreach(string str in medNames)
                {
                    Label mylab = new Label();

                    mylab.Text = str;
                    //mylab.BringToFront();
                    mylab.Location = new Point(labelX, labelY);
                    mylab.AutoSize = true;
                    mylab.Font = new Font("Microsoft Sans Serif", 12);
                    mylab.ForeColor = Color.Black;
                    mylab.Padding = new Padding(6);

                        // Adding this control to the form
                        this.Controls.Add(mylab);
                    num.Add(new NumericUpDown() 
                    { Location = new Point(labelX1, labelY1),Maximum=1000,Minimum=0,Increment=1 });
                    
                    labelY1 += 40; 

                    //labelX += 15;
                    labelY += 40;
                }
                foreach(NumericUpDown obj in num)
                {
                    this.Controls.Add(obj);
                }
            }
        }

        private void panel1_Paint(object sender, PaintEventArgs e)
        {

        }

        private void bill_Load(object sender, EventArgs e)
        {

        }

        private void button1_Click(object sender, EventArgs e)
        {
            if(textBox3.Text!="")
            {
                textBox1.Text = "";
                dataGridView1.Rows.Clear();
                showbill();
            }
            
        }
        private void showbill()
        {
            List<int> price=new List<int>();
            SqlDataReader rdr;
            SqlCommand newCommand;
            SqlConnection newConnection = new SqlConnection(connectionString);
            newConnection.Open();
            for (int i = 0; i < medNames.Count; i++)
            {
                newCommand = new SqlCommand("SELECT Price_per_unit FROM MEDICINE WHERE Med_name = '" + medNames[i] + "'", newConnection);

                rdr = newCommand.ExecuteReader();
                if (rdr.Read())
                {
                    price.Add(Convert.ToInt32(rdr[0].ToString()));
                }
                rdr.Close();
            }
            newConnection.Close();

            double total_amount = 0.00;
            int j = 0;
            foreach(NumericUpDown obj in num)
            {
                dataGridView1.Rows.Add(price[j].ToString(), obj.Value.ToString());
                total_amount += price[j] * Convert.ToInt32(obj.Value);
                j++;
            }
            textBox1.Text = total_amount.ToString();

            newConnection = new SqlConnection(connectionString);
            newConnection.Open();
            using (var e1 = num.GetEnumerator())
            using (var e2 = medNames.GetEnumerator())
            {
                while (e1.MoveNext() && e2.MoveNext())
                {
                    var item1 = e1.Current;
                    var item2 = e2.Current;
                    string updateString = "Update MEDICINE Set Quantity = Quantity - '" + item1.Value + "' Where Med_name = '" + item2 + "'";
                    newCommand = new SqlCommand(updateString, newConnection);
                    int k = newCommand.ExecuteNonQuery();
                }
            }
            newConnection.Close();


            textBox3.Text = "";

        }

        private void button5_Click(object sender, EventArgs e)
        {
            this.Hide();
            Form menu = new Menu();
            menu.Show();
        }
    }
}

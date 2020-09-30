package welcome;

import java.io.IOException;
import java.io.PrintWriter;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;


@WebServlet("/Welcome")
public class Welcome extends HttpServlet {
	private static final long serialVersionUID = 1L;

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		response.setContentType("text/html");
		PrintWriter pout = response.getWriter();
		String username = request.getParameter("username");
		try {
			Class.forName("com.mysql.jdbc.Driver");
			Connection conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/test","root","root");
			PreparedStatement pst = conn.prepareStatement("select *from users where username=?");
			pst.setString(1, username);
			ResultSet rst = pst.executeQuery();
			pout.print("<table border='1'>");
			pout.print("<tr><th>Username</th><th>Firstname</th><th>Lastname</th><th>Gender</th><th>Email</th><th>Moblie</th><th>Class</th><th>Department</th><th>Age</th><th>Address</th><th>Subject</th></tr>");
			while(rst.next()) {
				pout.print("<tr><td>"+rst.getString(1)+"</td><td>"+rst.getString(3)+"</td><td>"+rst.getString(4)+"</td><td>"+rst.getString(5)+"</td><td>"+rst.getString(6)+"</td><td>"+rst.getString(7)+"</td><td>"+rst.getString(8)+"</td><td>"+rst.getString(9)+"</td><td>"+rst.getString(10)+"</td><td>"+rst.getString(11)+"</td><td>"+rst.getString(12)+"</td>"+"</tr>");
			}
			pout.print("<table>");
			pout.print("<a href='login.html'>Logout</a>");
		} catch (Exception e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
	}

}
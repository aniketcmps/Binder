package com.hackaz.db;

import java.io.IOException;
import java.io.PrintWriter;
import java.util.ArrayList;
import java.util.List;

import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 * Servlet implementation class JobMatch
 */
@WebServlet("/JobMatch")
public class JobMatch extends HttpServlet {
	private static final long serialVersionUID = 1L;

	/**
	 * @see HttpServlet#HttpServlet()
	 */
	public JobMatch() {
		super();
		// TODO Auto-generated constructor stub
	}

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse
	 *      response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response)
			throws ServletException, IOException {
		// TODO Auto-generated method stub
		// response.getWriter().append("Served at:
		// ").append(request.getContextPath());

		String email = request.getParameter("email");
		String jobid = request.getParameter("jobid");
		String message = "";
		System.out.println(email + " " + jobid + " 1 " + message);

		if (email != null) {
			System.out.println(email + "   Request received");

			List<Integer> joblist = new ArrayList();
			Query q = new Query();
			joblist = q.matchuser(email);
			System.out.println("Success");

			// message = message + joblist.size() + ",";
			for (int i = 0; i < joblist.size(); i++) {
				message = message + joblist.get(i).toString() + ",";
			}
		} else if (jobid != null) {
			System.out.println(jobid + "   Request received");
			int job = Integer.parseInt(jobid);

			List<String> userlist = new ArrayList();
			Query q = new Query();
			userlist = q.matchcompany(job);
			System.out.println("Success");

			// message = message + joblist.size() + ",";
			for (int i = 0; i < userlist.size(); i++) {
				message = message + userlist.get(i) + ",";
			}
		} else
			System.out.println("No request / Improper request");

		System.out.println("Sending response");
		System.out.println(message);
		response.setContentType("text/plain");
		response.setContentLength(message.length());
		PrintWriter out = response.getWriter();
		out.println(message);

		out.close();
		out.flush();
	}

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse
	 *      response)
	 */
	protected void doPost(HttpServletRequest request, HttpServletResponse response)
			throws ServletException, IOException {
		// TODO Auto-generated method stub
		doGet(request, response);
	}

}

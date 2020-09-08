using Mvc.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Net.Http;
using System.Web;
using System.Web.Mvc;

namespace Mvc.Controllers
{
    public class CustomerController : Controller
    {
        // GET: Customer
        public ActionResult Index()
        {
            IEnumerable<mvcCustomerModel> cusList;
            HttpResponseMessage response = GlobalVariables.WebApiClient.GetAsync("Customer").Result;
            cusList = response.Content.ReadAsAsync<IEnumerable<mvcCustomerModel>>().Result;
            return View(cusList);
        }
        public ActionResult AddOrEdit(int id = 0)
        {
            if(id==0)
            return View(new mvcCustomerModel());
            else
            {
                HttpResponseMessage response = GlobalVariables.WebApiClient.GetAsync("Customer/"+id.ToString()).Result;
                return View(response.Content.ReadAsAsync<mvcCustomerModel>().Result);
            }
        }
        [HttpPost]
        public ActionResult AddOrEdit(mvcCustomerModel cus)
        {
            if (cus.CustomerID == 0)
            {
                HttpResponseMessage response = GlobalVariables.WebApiClient.PostAsJsonAsync("Customer", cus).Result;
                TempData["SuccessMessage"] = "Uspješno spremljeno";
            }
            else
            {
                HttpResponseMessage response = GlobalVariables.WebApiClient.PutAsJsonAsync("Customer/"+cus.CustomerID,cus).Result;
                TempData["SuccessMessage"] = "Uspješno ažurirano";

            }
            return RedirectToAction("Index");
        }

        public ActionResult Delete(int id)
        {
            HttpResponseMessage response = GlobalVariables.WebApiClient.DeleteAsync("Customer/"+id.ToString()).Result;
            TempData["SuccessMessage"] = "Uspješno izbrisano";
            return RedirectToAction("Index");
        }
    }
}
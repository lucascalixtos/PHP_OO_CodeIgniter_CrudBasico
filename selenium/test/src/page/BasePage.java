package page;

import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;

public class BasePage {

	protected WebDriver driver;
	private String url = "http://localhost/modulo/tarefa/";
	
	public BasePage(WebDriver driver, String uri){
		this.driver = driver;
		this.driver.get(url+uri);
		this.driver.manage().window().maximize();
	}

	protected boolean hasClass(WebElement element, String htmlClass) {
	    String[] classes = element.getAttribute("class").split("\\s+");
	    if (classes != null) {
	        for (String classAttr: classes) {
	            if (classAttr.equals(htmlClass)) {
	                return true;
	            }
	        }
	    }
	    return false;
	}
}

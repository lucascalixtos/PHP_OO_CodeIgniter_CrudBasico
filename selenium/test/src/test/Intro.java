package test;

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.firefox.FirefoxDriver;

public class Intro {

	public static void main(String[] args) {
		System.setProperty("webdriver.gecko.driver","C:\\selenium\\driver\\geckodriver.exe");
		WebDriver driver = new FirefoxDriver();
		driver.get("http://google.com.br");
		
		WebElement input = driver.findElement(By.name("q"));
		input.sendKeys("IFSP");
		input.submit();
	}

}

package test;

import static org.junit.Assert.assertTrue;

import org.junit.AfterClass;
import org.junit.Before;
import org.junit.BeforeClass;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.firefox.FirefoxDriver;

import page.E2EPage;

public class BaseTest {

	protected static WebDriver driver;
	
	@BeforeClass
	public static void inicializa() {
		System.setProperty("webdriver.gecko.driver","C:\\selenium\\driver\\geckodriver.exe");
		driver = new FirefoxDriver();
	}
	
	
	@Before
	public void cleanDB() {
		E2EPage e2e = new E2EPage(driver);	
		boolean b = e2e.limpaTabelaDeTeste();
		assertTrue(b);
	}
	
	
	@AfterClass
	public static void encerra() {
	    driver.quit();
//		System.out.println("Fim do teste");
	}
	
}

// para usar o chrome
// System.setProperty("webdriver.chrome.driver","C:\\selenium\\driver\\chromedriver");
package page;

import java.util.List;

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;

public class TurmaPage extends BasePage{

	public TurmaPage(WebDriver driver) {
		super(driver, "");
	}

	public TarefaPage selecionaTurma(int i) {
		List<WebElement> link = driver.findElements(By.cssSelector("tr a"));
		link.get(0).click();
		return new TarefaPage(driver, i);
	}

}

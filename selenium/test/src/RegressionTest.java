import org.junit.runner.JUnitCore;
import org.junit.runner.Result;
import org.junit.runner.notification.Failure;

/*
 * Um Teste de Regressão é aquele que, quando executado, busca descobrir 
 * se nehuma parte do sistema em desenvolvimento foi prejudicada em função 
 * do desenvolvimento de novas funcionalidades, ou seja, regrediram em seu
 * estado de desenvolvimento.
 */


public class RegressionTest {

	public static void main(String[] args) {
		Result result = JUnitCore.runClasses(TestSuite.class);

		for( Failure failure: result.getFailures() ) {
			System.out.println(failure.toString());
		}
		System.out.println(result.wasSuccessful());
	}

}

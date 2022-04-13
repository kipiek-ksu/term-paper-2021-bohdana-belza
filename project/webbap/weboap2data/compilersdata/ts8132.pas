ar a,b,h : real;

BEGIN
	read(a,b,h);
	while(a<=b) do
	begin
		writeln(1/(1+sqr(a)):0:4);
		a:=a+h;
	end;	
END.
Program L3z11;
var
   A:string;
   S:longint;
   k:longint;
   Function Converter(x:string):longint;
   var
      i:integer;
      k:longint;
      result:longint;
   begin
	result:=0;

	k:=1;
	for i := length(x) downto 1 do
	begin
	     result := (ord(x[i]) - 48) * k  + result;
	     k:=k*2;
	end;

	Converter:=result
   end;

begin
     read(A);

     S := Converter(A);

     write(S)
end.
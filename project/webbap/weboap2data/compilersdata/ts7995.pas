Program L8Z18;
var
   n:integer;

   Function F(n:integer):longint;
   begin
        if n=0 then
           F:=1
        else
            if n=1 then
               F:=2
            else
                F:=2*F(n-1)-(n-2)
   end;

begin
     read(n);
     write(F(n))
end.
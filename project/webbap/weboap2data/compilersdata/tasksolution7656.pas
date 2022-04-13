program L8z10;
var
   n:longint;
   Odds:integer;
   Function F(n:longint):integer;
   begin
        if n < 10 then
           F:=n mod 2
        else
            if n mod 2 = 1 then
               F:=F(n div 10)+1
            else
                F:=F(n div 10)
   end;
begin
     read(n);
     Odds:=F(n);
     write(Odds)
end.
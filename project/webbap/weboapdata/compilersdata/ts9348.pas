var a:string;
 i,s,x:integer;

begin
 read( a ); x:=a;
 s:=0;
 while ( x<>0 ) do 
 begin
   s := s + (x mod 10);
   x := x div 10;
 end;
end.
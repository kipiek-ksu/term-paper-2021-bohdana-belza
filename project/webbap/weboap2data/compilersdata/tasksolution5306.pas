program ercoder;
 var m:real; a:real;
begin
 read(m);
 a:=(sqrt((m+2)/(m-2))+sqrt((m-2)/(m+2)))/(sqrt((m+2)/(m-2))-sqrt((m-2)/(m+2)));
 writeln('a=',a:9:4);
end.

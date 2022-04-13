Program Lab_10_119;


Type
    TChuild = record
       Surname: string;
       name: string;
       year: integer;
       sickness: string;
       vaccin: string;
       address: string;
    end;


    info = file of TChuild;


var
   n,i: integer;
   children: TChuild;
   inf: info;

procedure add_info( var inf: info);

var
   i: integer;
   Children: TChuild;
   begin
        
        readln(n);

        assign(inf,'information.pas');
        rewrite(inf);


        for i:= 1 to n do
        begin
             with children do
             begin
                 
                  read(surname);
                 
                  read(name);
                 
                  read(year);
                 
                  read(sickness);
                  
                  read(vaccin);
                 
                  read(address);
                  write;

             end;
             write(inf,children)
        end;

        close(inf)
   end;


procedure print_info( var inf: info);

var Children: TChuild;
begin
     assign(inf,'information.pas');
     reset(inf);

     while not (eof(inf)) do
     begin
     read(inf,Children);
     if (2007 - Children.year > 5) then
     begin
          with Children do
          begin
               write('Surname: ',surname);
               write('Name: ',name);
               write('Year: ',year);
               write('Sickness: ',sickness);
               write('Vaccin: ',vaccin);
               write('Address: ',address);
          end
     end
     end;
     close(inf)
end;


begin
     clrscr;
     add_info(inf);
     print_info(inf);

end.